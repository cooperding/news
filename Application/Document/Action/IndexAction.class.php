<?php

/**
 * IndexAction.class.php
 * 前台首页
 * 前台核心文件，其他页面需要继承本类方可有效
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */

namespace Document\Action;

use Think\Action;

class IndexAction extends BasedocAction {

    public function index() {
        
        $skin = $this->skin; //获取前台主题皮肤名称
        $tpl_home = $this->tpl_home; //获取主题皮肤模板名称
        $this->theme($skin)->display($tpl_home . 'index');
    }

}
