<?php

/**
 * YounuoUMSClient
 * SSO单点登录客户端-发起请求
 * @author cooper <qiuyuncode@163.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2014-11-23 21:15
 * @package  Controller
 * @todo 
 */

namespace Org\Younuo;

class YounuoUMSClient {

    public $sites_id = 'e658a3576149b9174a1cbf974d86d0fe'; //站点id
    public $signature = 'ad1dd6651e6a28f91ded5fd35ae8ef80'; //站点签名
    public $skey = 'e17c0d10061a89bfcde7e0c8c4d2715d'; //站点密钥

    /**
     * checkAuth
     * 
     * @access public
     * @param array $data 回传数据
     * @return array
     */

    function checkAuth($data) {
        $signature = trim($this->signature);
        $openinfo = $data['openinfo'];
        $parakey = $data['parakey'];
        $tokey = $data['tokey'];
        $str = md5(md5($signature) . md5($openinfo) . md5($parakey));
        if($tokey==$str){//相等数据一致，验证成功
            return 'ok';
        }  else {//数据匹配不一致
            return 'no';
        }

    }

    /**
     * getFormKey
     * 获取加密数据
     * @access public
     * @return array
     */
    function getFormKey() {
        $signature = trim($this->signature);
        $sites_id = trim($this->sites_id);
        $skey = trim($this->skey);
        $json['formkey'] = md5(md5($sites_id) . md5($signature) . md5($skey));
        $json['signature'] = $signature; //可以不传递站点签名
        $json['skey'] = $skey; //可以不传递站点签名
        $json['sites_id'] = $sites_id;
        return $json;
    }

}
