<?php

/**
 * BasememberAction.class.php
 * 前台页面公共方法
 * 前台核心文件，其他页面需要继承本类方可有效
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */

namespace User\Action;

use Think\Action;

class BaseuserAction extends Action {

    //初始化
    function _initialize() {
        //此处判断是否已经登录，如果登录跳转到后台首页否则跳转到登录页面
        $status = session('LOGIN_M_STATUS');
        if ($status != 'TRUE') {
            $this->redirect('..' . __MODULE__ . '/Passport/login');
        }
        $this->assign('count_newslist', $this->getNewsListCount());
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $skin_home = $this->getSkin('cfg_skin_web'); //获取前台主题皮肤名称
        $navhead = R('Common/System/getNav', array('header')); //导航菜单
        $navfoot = R('Common/System/getNav', array('footer')); //导航菜单
        $this->assign('navhead', $navhead);
        $this->assign('navfoot', $navfoot);
        $this->assign('style_common', '/Common');
        $this->assign('style', '/Skin/User/' . $skin);
        $this->assign('tpl_header', './Theme/Home/' . $skin_home . '/tpl_header.html');
        $this->assign('tpl_footer', './Theme/Home/' . $skin_home . '/tpl_footer.html');
        $this->assign('tpl_sidebar', './Theme/User/' . $skin . '/tpl_sidebar.html');
    }

    /*
     * getNewsListCount
     * 获取apiList数量
     * 
     */

    public function getNewsListCount() {
        $m = D('Title');
        $uid = session('LOGIN_M_ID');
        $condition['members_id'] = array('eq', $uid);
        $count = $m->where($condition)->count();
        return $count;
    }

    /*
     * getSkin
     * 获取站点设置的主题名称
     * @todo 使用程序读取主题皮肤名称
     */

    public function getSkin($str) {
        $str = $str ? $str : 'cfg_member_skin';
        $skin = R('Common/System/getCfg', array($str));
        if (!$skin) {
            $skin = C('DEFAULT_THEME');
        }
        return $skin;
    }

}

?>
