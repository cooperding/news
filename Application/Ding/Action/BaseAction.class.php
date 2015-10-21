<?php

/**
 * BaseAction.class.php
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
class BaseAction extends Action {

    /**
     * _initialize
     * 初始化数据信息 
     * @access public
     * @param string error 0：成功；101：验证签名失败；102：api禁用；
     * @return boolean
     */
    function _initialize() {
        $this->OAPI_HOST = 'https://oapi.dingtalk.com';
        $this->CORPID = 'dingacc596bfe9004c7c';
        $this->SECRET = 'c5tuiUP6ArvQJuL5AjkfJL94itk-a905K3Qx-f5TjyTtehX6JZrbdrTzpJKDDTLt';
        $skin = 'default'; //获取前台主题皮肤名称
        $this->skin = $skin;
        $tpl_home = $this->tpl_home = C('TPL_HOME');
        $tpl_user = $this->tpl_user = C('TPL_USER');
        $this->assign('style_common', '/Common');
        $this->assign('style', __ROOT__ . '/Theme/' . MODULE_NAME . '/' . $skin . '/style');
        $this->assign('tpl_header', './Theme/' . MODULE_NAME . '/' . $skin . '/' . $tpl_home . 'header.html');
        $this->assign('tpl_footer', './Theme/' . MODULE_NAME . '/' . $skin . '/' . $tpl_home . 'footer.html');
        $this->assign('tpl_sidebar', './Theme/' . MODULE_NAME . '/' . $skin . '/' . $tpl_user . 'sidebar.html');
        
    }

}
