<?php

/**
 * PageAction.class.php
 * 前台首页
 * 前台单页文件
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
namespace Home\Action;
use Think\Action;
class PageAction extends BasehomeAction {

    public function index()
    {
        $m = M('Pages');
        $id = I('get.id');
        $condition['id'] = array('eq',$id);
        $condition['status'] = array('eq',20);
        $data = $m->where($condition)->find();
        if($data){
            $data['content'] = stripslashes($data['content']);
        }
        $this->assign('data', $data); // 赋值数据集
        $this->assign('title', $data['ename']);
        $this->assign('keywords', $data['keywords']);
        $this->assign('description', $data['description']);
        $this->theme($skin)->display(':page');
    }

}
