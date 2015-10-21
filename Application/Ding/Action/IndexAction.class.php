<?php

/**
 * IndexAction.class.php
 * 接口文件
 * 验证登录信息
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
namespace Ding\Action;
use Think\Action;
class IndexAction extends BaseAction {

    /**
     * index
     * 索引页 
     * @access public
     * @param string $token token
     * @param string $key apikey
     * @param string $id id
     * @return json
     */
    public function index() {
        $this->getDepartmentList();
        
        $skin = $this->skin; //获取前台主题皮肤名称
        $tpl_home = $this->tpl_home; //获取主题皮肤模板名称
        $this->theme($skin)->display($tpl_home . 'index');
    }

    /**
     * getDepartmentList
     * 获取部门列表 
     * @access public
     * @return json
     */
    public function getDepartmentList() {
        
        import('Vendor.Httpful.Bootstrap');
        \Httpful\Bootstrap::init();
        $str = 'access_token='.$this->getAccessToken();
        $url = $this->OAPI_HOST . '/department/list?'.$str;
        $response = \Httpful\Request::get($url)
                ->expectsJson()
                ->send();
        $rs = $response->raw_body;
//        print_r(json_decode($rs,true));
//        print_r($rs);
    }

    /**
     * getAccessToken
     * 获取access_token 
     * @access public
     * @return json
     */
    public function getAccessToken() {
        header("Content-type: text/html; charset=utf-8");
        import('Vendor.Httpful.Bootstrap');
        \Httpful\Bootstrap::init();
        $str = 'corpid='.$this->CORPID.'&corpsecret=' . $this->SECRET;
        $url = $this->OAPI_HOST . '/gettoken?'.$str;
        $response = \Httpful\Request::get($url)
                ->expectsJson()
                ->send();
        $access_token = $response->body->access_token;
        $errcode = $response->body->errcode;
        $errmsg = $response->body->errmsg;
        return $access_token;
    }

}
