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
        $m = M('DocumentList');
        $id = intval(trim(I('get.id')));
        $sid = intval(trim(I('get.sid')));
        /* 分析：
         * 分类(sid)与文档(id)同时存在时，优先级为id，同时sid无效，新的sid值由id查询得出
         * 分类sid存在，ID不存在使用sid获取数据
         * 分类sid不存在，ID存在，sid值由id查询得出
         * 分类sid，ID都不存在提示新的页面信息
         */
        if (!empty($id)) {//文档id不为空
            $condition['id'] = array('eq', $id);
            $condition['status'] = array('eq', '20');
            $data = $m->where($condition)->find();
            if ($data) {
                $sortid = $data['sort_id'];
            }
        } else {//id为空，sid不为空或者为空操作
            if (!empty($sid)) {//分类sid不为空
                $sortid = $sid;
            } else {//分类sid为空
                $sortid = '';
            }
        }
        $list = $this->getSortList($sortid);
        $this->assign('data', $data);
        $this->assign('menu', $list);
        $this->assign('title', $data['text']);
        $skin = $this->skin; //获取前台主题皮肤名称
        $tpl_home = $this->tpl_home; //获取主题皮肤模板名称
        $this->theme($skin)->display($tpl_home . 'index');
    }

    /*
     * getSortList
     * 通过分类ID获取，所有该分类下的信息
     * $sid int 分类ID
     * return array();
     */

    public function getSortList($sid) {
        if (!empty($sid)) {//存在获取当前分类信息
            $m = M('DocumentList');
            $condition['sort_id'] = array('eq', $sid);
            $condition['status'] = array('eq', '20');
            
        } else {//不存在，获取所有分类信息
            $m = M('DocumentSort');
            $condition['status'] = array('eq', '20');
        }
        $qiuyun = new \Org\Util\Qiuyun;
//        $m = D('DocumentList');
//        $condition['sort_id'] = array('eq',7);
        $tree = $m->field('id,parent_id,text')->where($condition)->select();
        $tree = $qiuyun->list_to_tree($tree, 'id', 'parent_id', 'children');
        
        $menu = $this->getHtmlList($tree);
//        $list = $m->where($condition)->select();
        return $menu;
    }
    public function getHtmlList($data){
        if(is_array($data)){
            foreach ($data as $k=>$v){
                if(isset($v['children'])){
                    $str .= '<li class="active"><a href="'.$v['id'].'"><i class="fa fa-circle-o"></i> '.$v['text'].'<i class="fa fa-angle-left pull-right"></i></a>';
                    $str .= '<ul class="treeview-menu">';
                    $str .= $this->getHtmlList($v['children']);
                    $str .= '</ul>';
                }  else {
                    $str .= '<li><a href="'.$v['id'].'"><i class="fa fa-circle-o"></i> '.$v['text'].'</a>';
                }
                $str .= '</li>';
            }//foreach
        }//if
        return $str;
    }

}
