<?php

/**
 * PassportAction.class.php
 * 后台登录页面
 * 后台核心文件，用于后台登录操作验证
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:20
 * @package  Controller
 */

namespace User\Action;
use Think\Action;

class PassportAction extends Action {

    //初始化
    function _initialize() {
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $navhead = R('Common/System/getNav', array('header')); //导航菜单
        $this->assign('navhead', $navhead);
        $this->assign('style_common', '/Common');
        $this->assign('style', '/Skin/User/' . $skin);
        $this->assign('tpl_header', './Theme/User/' . $skin . '/tpl_header.html');
        $this->assign('tpl_footer', './Theme/User/' . $skin . '/tpl_footer.html');
    }

    /**
     * index
     * 进入登录页面
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function index() {

        //此处判断是否已经登录，如果登录跳转到后台首页否则跳转到登录页面
        $status = session('LOGIN_M_STATUS');
        if ($status == 'TRUE') {
            $this->redirect('..' . __MODULE__);
        } else {
            $this->login();
        }
    }

    /*
     * login 
     * 会员登录
     * @access public
     * @return array
     * @version dogocms 1.0
     */

    public function login() {
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $this->assign('title', '会员登录');
        $this->theme($skin)->display(':login');
    }

    /*
     * signup 
     * 注册会员
     * @access public
     * @return array
     * @version dogocms 1.0
     */

    public function signup() {
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $this->assign('title', '会员注册');
        $this->theme($skin)->display(':signup');
    }

    /*
     * resetPassword 
     * 注册会员
     * @access public
     * @return array
     * @version dogocms 1.0
     */

    public function resetPassword() {
        $skin = $this->getSkin(); //获取前台主题皮肤名称

        $this->assign('title', '重置密码');
        $this->theme($skin)->display(':resetpwd');
    }

    /**
     * checkLogin
     * 登录验证
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function checkLogin() {
        //基础数据的验证
        /*
          $ver_code = I('post.v_code');
          $verify_status = $this->check_verify($ver_code);
          $type = I('post.type');
          if (!$verify_status) {
          $this->error('验证码输入错误或已过期！');
          exit;
          }
         * 
         */
        //echo md5('e658a3576149b9174a1cbf974d86d0fe' . 'ad1dd6651e6a28f91ded5fd35ae8ef80' . 'e17c0d10061a89bfcde7e0c8c4d2715d');
        $email = I('post.email'); //邮箱
        if (empty($email)) {
            $this->error('用户名或邮箱帐号不能为空！');
            exit;
        }
        $pwd = I('post.pwd'); //密码
        if (empty($pwd)) {
            $this->error('密码不能为空！');
            exit;
        }
        $json['email'] = $email;
        $json['pwd'] = $pwd;

        //请求会员服务器验证用户信息
        $ums = new \Org\Younuo\YounuoUMSClient(); //验证单点登录
        $url = 'http://localhost/younuosso/api/Members/login';
        $data_form = $ums->getFormKey();
        $json = array_merge($json, $data_form);
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $data = curl_exec($ch); //运行curl
        curl_close($ch);
        $data = json_decode($data, TRUE);
        if ($data['statuscode'] == '200') {
            //验证回传数据
            $status = $ums->checkAuth($data);
            if ($status == 'ok') {
                $endecry = new \Org\Younuo\YounuoEndecry();
                $openinfo = $endecry->decrypt($data['openinfo'], $data['parakey']);
                cookie('LOGIN_SITES', json_encode($data['sites']), 3600);
                session('LOGIN_M_STATUS', 'TRUE');
                session('openinfo',$openinfo);
                session('LOGIN_M_ID', substr($openinfo, 0, 32));
                session('LOGIN_M_NAME', substr($openinfo, 32, strlen($openinfo)));
                $this->success('登陆成功！', __MODULE__);
                exit;
            } else {
                $this->error('登录失败！');
            }
            //判断验证是否成功
        } else {
            $this->error('登录失败！');
        }
    }

    /**
     * getNewPwd
     * 找回新的密码
     * @access public
     * @return boolean
     * @version dogocms 1.0
     * @todo 完善密码找回操作，增加邮件发送功能
     */
    public function getNewPwd() {
        $m = M('Members');
        $v_code = I('post.v_code');
        $verify_status = $this->check_verify($v_code);
        if (!$verify_status) {
            $this->error('验证码为空或者输入错误！');
            exit;
        }
        $email = I('post.email'); //邮箱
        if (empty($email)) {
            $this->error('注册邮箱不能为空！');
            exit;
        }
        //先验证邮箱是否存在
        $condition['email'] = array('eq', $email);
        $rs = $m->where($condition)->field('id,username')->find();
        if (!$rs) {
            $this->error('注册邮箱不正确！');
            exit;
        }
        //随机生成密码，并发送到注册邮箱中
        $pwd = rand(100000, 999999);
        $uname = $rs['username'];
        $password = R('Common/System/getPwd', array($uname, $pwd));
        $data['password'] = $password;
        $data['updatetime'] = time();
        $condition_id['id'] = $rs['id'];
        $rs_pwd = $m->where($condition_id)->save($data);
        if ($rs_pwd == true) {
            $rs_email = R('Common/System/sendEmail', array($email, '找回密码', $pwd));
            if ($rs_email) {
                $this->success('重置密码成功，请登录邮箱查看！', __MODULE__);
            } else {
                $this->error('重置密码失败，请重新发送！');
            }
        } else {
            $this->error('重置密码失败！');
        }
    }

    /**
     * register
     * 注册会员
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function register() {
        $m = M('Members');
        $v_code = I('post.v_code');
        $verify_status = $this->check_verify($v_code);
        $type = I('post.type');
        if (!$verify_status) {
            $this->error('验证码为空或者输入错误！');
        }
        $uname = I('post.uname'); //用户名
        $email = I('post.email'); //邮箱
        $pwd = I('post.pwd'); //密码
        $pwd2 = I('post.pwd2'); //密码2
        if (empty($uname)) {
            $this->error('用户名不能为空！');
        }
        if (empty($email)) {
            $this->error('邮箱不能为空！');
        }
        if (empty($pwd) || empty($pwd2)) {
            $this->error('密码不能为空！');
        }
        if ($pwd != $pwd2) {
            $this->error('两次密码输入不一致！');
        }
        $condition_uname['username'] = array('eq', $uname);
        $rs_uname = $m->where($condition_uname)->find();
        if ($rs_uname) {
            $this->error('用户名已经存在！');
        }
        $condition_email['email'] = array('eq', $email);
        $rs_email = $m->where($condition_email)->find();
        if ($rs_email) {
            $this->error('邮箱已经存在！');
        }
        $password = R('Common/System/getPwd', array($uname, $pwd));
        $data['username'] = $uname;
        $data['password'] = $password;
        $data['addtime'] = time();
        $data['updatetime'] = time();
        $data['email'] = $email;
        $data['ip'] = get_client_ip();
        $rs = $m->data($data)->add();
        if ($rs == true) {
            $this->success('注册成功,请登录后操作！', __MODULE__ . '/Passport/login');
        } else {
            $this->error('注册失败，请联系管理员！');
        }
    }

    /**
     * logout
     * 退出登录，清除session
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function logout() {
        $type = I('post.type');
        session('[destroy]');
        if ($type == '10') {
            $array = array('status' => 0, 'msg' => '您已经成功退出会员系统！');
            echo json_encode($array);
            exit;
        } else {
            $this->success('您已经成功退出会员系统！', __ROOT__);
        }
    }

    /**
     * verify
     * 生成验证码
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function verify() {
        $verify = new \Think\Verify();
        $verify->useImgBg = false; //是否使用背景图片 默认为false
        //$verify->expire =; //验证码的有效期（秒）
        //$verify->fontSize = 70; //验证码字体大小（像素） 默认为25
        $verify->useCurve = false; //是否使用混淆曲线 默认为true
        $verify->useNoise = false; //是否添加杂点 默认为true
        //$verify->imageW = 70; //验证码宽度 设置为0为自动计算
        //$verify->imageH = 25; //验证码高度 设置为0为自动计算
        $verify->length = 4; //验证码位数
        //$verify->fontttf =;//指定验证码字体 默认为随机获取
        $verify->useZh = false; //是否使用中文验证码 默认false
        //$verify->bg = array(243, 251, 254); //验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)
        $verify->seKey = 'verify_user_login'; //验证码的加密密钥
        $verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = '') {
        $verify = new \Think\Verify();
        $verify->seKey = 'verify_user_login'; //验证码的加密密钥
        return $verify->check($code);
    }

    /*
     * getSkin
     * 获取站点设置的会员中心主题名称
     * @todo 使用程序读取主题皮肤名称
     */

    public function getSkin() {
        $skin = R('Common/System/getCfg', array('cfg_member_skin'));
        if (!$skin) {
            $skin = C('DEFAULT_THEME');
        }
        return $skin;
    }

    /**
     * checkEmail
     * 验证邮箱
     * @param string $key 加密后的key
     * @param string $uid 会员编号
     * @return boolean
     * @version dogocms 1.0
     * @todo 
     */
    public function checkEmail() {
        $key = I('get.key');
        $uid = I('get.uid');
        $m = M('Members');
        $condition['id'] = array('eq', $uid);
        $condition['email_key'] = array('eq', $key);
        $data = $m->where($condition)->find();
        if ($data) {
            if ($data['email_status'] == '20') {//验证改邮箱是否曾验证成功
                $array = array('status' => 0, 'msg' => '邮箱已验证成功！');
            } else {
                $time = (int) time() - (int) $data['email_sendtime'];
                if ($time > 60 * 60 * 24 * 2) {//两天
                    $array = array('status' => 1, 'msg' => '验证无效，验证时间超时！');
                } else {
                    $_data['email_key'] = '';
                    $_data['email_authtime'] = time();
                    $_data['email_status'] = '20';
                    $rs = $m->where($condition)->save($_data);
                    if ($rs) {
                        $array = array('status' => 0, 'msg' => '邮箱验证成功！');
                    } else {
                        $array = array('status' => 1, 'msg' => '验证失败，请重新发送验证邮件！');
                    }
                }//if
            }
        } else {
            $array = array('status' => 1, 'msg' => '验证失败，请重新发送验证邮件！');
        }
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $this->assign('title', '邮箱验证');
        $this->assign('data', $array);
        $this->theme($skin)->display(':checkemail');
    }

}
