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
namespace Api\Action;
use Think\Action;
class IndexAction extends Action {

    public function index()
    {
        
        //验证登录信息
        $url = $_SERVER['HTTP_HOST'];
        $tokey = I('get.tokey');
        $open_id = I('get.open_id');
        $parakey = I('get.parakey');
        $ums = new \Org\Younuo\YounuoUMSClient(); //验证单点登录
        
        
        $str = $tokey.$open_id.$parakey;
        $t = $url.time().'===';
        file_put_contents('11.txt', $t.$str);
    }

}
