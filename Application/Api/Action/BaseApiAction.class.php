<?php

/**
 * BaseApiAction.class.php
 * 接口文件
 * 验证登录信息
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
namespace Api\Action;
use Think\Action;
class BaseApiAction extends Action {

    /**
     * _initialize
     * 初始化数据信息 
     * @access public
     * @param string error 0：成功；101：验证签名失败；102：api禁用；
     * @return boolean
     */
    function _initialize() {
        $key = trim(I('post.key'));
        $token = trim(I('post.token'));
        $api_data = $this->getSecret($key);
        //验证api是否可用有效
        if ($api_data['status'] != '20') {
            $array = array('error' => 102, 'msg' => 'api禁用');
            echo json_encode($array);
            exit;
        }
        //验证签名
        $array = $_POST;
        unset($array['token']);
        $array['secret'] = $api_data['dapi_secret'];
        ksort($array);
        foreach ($array as $v) {
            $str.=$v;
        }
        $mytoen = md5($str);
        if ($mytoen != $token) {
            $array = array('error' => 101, 'msg' => '验证签名失败');
            echo json_encode($array);
            exit;
        }
    }

    /**
     * getDataList
     * 获取列表数据 
     * @access public
     * @return json
     */
    public function checkAuth($key) {
        echo time();
        exit;
    }

    /**
     * getDataList
     * 获取列表数据 
     * @access public
     * @return json
     */
    public function getSecret($key) {
        $m = M('Api');
        $condition['dapi_key'] = array('eq', $key);
        //$condition['status'] = array('eq',20);
        $rs = $m->field('id,dapi_secret,status')->where($condition)->find();
        if ($rs) {
            return $rs;
        }
    }

}
