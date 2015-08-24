<?php

/**
 * DocumentAction.class.php
 * 文档手册分类、文档手册列表
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 内容模型各项操作
 */

namespace Admin\Action;

use Think\Action;

class DocumentAction extends BaseAction {

    /**
     * index
     * 头部导航列表页
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index() {
        $this->display();
    }

    /**
     * newslist
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function newslist() {
        $sort_id = intval(trim(I('get.sort_id')));
        $this->assign('sort_id', $sort_id);
        $this->display('newslist');
    }

    /**
     * add
     * 添加信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function addDocument() {
        $sort_id = intval(trim(I('get.sort_id')));//分类ID
        $status = array(
            '20' => '启用',
            '10' => '禁用'
        );
        $this->assign('sort_id', $sort_id);
        $this->assign('status', $status);
        $this->display('doc_add');
    }

    /**
     * edit
     * 编辑信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function editDocument() {
        $m = M('DocumentList');
        $id = I('get.id');
        $condition['id'] = array('eq', $id);
        $data = $m->where($condition)->find();
        $status = array(
            '20' => '启用',
            '10' => '禁用'
        );
        $this->assign('status', $status);
        $this->assign('v_status', $data['status']);
        $this->assign('data', $data);
        $this->display('doc_edit');
    }
/**
     * insert
     * 头部导航add后插入数据库
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insertDocument() {
        //添加功能还需要验证数据不能为空的字段
        $m = D('DocumentList');
        $parent_id = I('post.parent_id');
        $text = I('post.text');
        if (empty($text)) {
            $this->dmsg('1', '分类名不能为空！', false, true);
        }
        if ($parent_id != 0) {
            $condition['id'] = array('eq', $parent_id);
            $data = $m->field('path')->where($condition)->find();
            $data_up['path'] = $data['path'] . $parent_id . ',';
        }
        $data_up['text'] = I('post.text');
        $data_up['status'] = $_POST['status'][0];
        $data_up['updatetime'] = time();
        $data_up['parent_id'] = $parent_id;
        $data_up['sort_id'] = I('post.sort_id');//分类ID
        $data_up['keywords'] = I('post.keywords');
        $data_up['description'] = I('post.description');
        $data_up['myorder'] = I('post.myorder');
        $data_up['content'] = $_POST['content'];
        $data_up['addtime'] = time();
        if ($m->create($data_up)) {
            $rs = $m->add();
            if ($rs) {
                $this->dmsg('2', '操作成功！', true);
            } else {
                $this->dmsg('1', '添加失败！', false, true);
            }
        } else {
            $this->dmsg('1', '根据表单提交的POST数据创建数据对象失败！', false, true);
        }
    }
    /**
     * update
     * 头部导航编辑后更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function updateDocument() {
        $m = D('DocumentList');
        $id = I('post.id');
        $parent_id = I('post.parent_id');
        $text = I('post.text');
        if (empty($text)) {
            $this->dmsg('1', '分类名不能为空！', false, true);
        }
        $tbname = 'DocumentList';
        if ($parent_id != 0) {//不为0时判断是否为子分类
            if ($id == $parent_id) {
                $this->dmsg('1', '不能选择自身分类为父级分类！', false, true);
            }
            $condition_sort['id'] = array('eq', $parent_id);
            $condition_sort['path'] = array('like', '%,' . $id . ',%');
            $cun = $m->field('id')->where($condition_sort)->find(); //判断id选择是否为其的子类
            if ($cun) {
                $this->dmsg('1', '不能选择当前分类的子类为父级分类！', false, true);
            }
            //获取父级path
            $condition_pid['id'] = array('eq', $parent_id);
            $data = $m->field('path')->where($condition_pid)->find();
            $sort_path = $data['path'] . $parent_id . ','; //取得不为0时的path
            $data_up['path'] = $data['path'] . $parent_id . ',';
            updatePath($id, $sort_path, $tbname); //用于批量更新
        } else {//为0，path为,
            $condition_id['id'] = array('eq', $id);
            $data = $m->field('parent_id')->where($condition_id)->find();
            if ($data['parent_id'] != $parent_id) {//相同不改变
                $sort_path = ','; //取得不为0时的path
                updatePath($id, $sort_path, $tbname); //用于批量更新
            }
            $data_up['path'] = ','; //应该是这个
        }
        $data_up['text'] = $text;
        $data_up['status'] = $_POST['status'][0];
        $data_up['updatetime'] = time();
        $data_up['parent_id'] = $parent_id;
        $data_up['keywords'] = I('post.keywords');
        $data_up['description'] = I('post.description');
        $data_up['myorder'] = I('post.myorder');
        $data_up['content'] = $_POST['content'];
        $condition['id'] = array('eq', $id);
        $rs = $m->where($condition)->save($data_up);
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '2未有操作或操作失败！', false, true);
        }
    }
    /**
     * index
     * 头部导航列表页
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortList() {
        $this->display('sort_list');
    }

    /**
     * add
     * 头部导航添加操作
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function addSort() {
        $status = array(
            '20' => '启用',
            '10' => '禁用'
        );
        $this->assign('status', $status);
        $this->display('sort_add');
    }

    /**
     * edit
     * 头部导航编辑操作
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function editSort() {
        $m = D('DocumentSort');
        $id = I('get.id');
        $condition['id'] = array('eq', $id);
        $data = $m->where($condition)->find();
        $status = array(
            '20' => '启用',
            '10' => '禁用'
        );
        $this->assign('status', $status);
        $this->assign('v_status', $data['status']);
        $this->assign('data', $data);
        $this->display('sort_edit');
    }

    /**
     * insert
     * 头部导航add后插入数据库
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insertSort() {
        //添加功能还需要验证数据不能为空的字段
        $m = D('DocumentSort');
        $parent_id = I('post.parent_id');
        $text = I('post.text');
        if (empty($text)) {
            $this->dmsg('1', '分类名不能为空！', false, true);
        }
        if ($parent_id != 0) {
            $condition['id'] = array('eq', $parent_id);
            $data = $m->field('path')->where($condition)->find();
            $data_up['path'] = $data['path'] . $parent_id . ',';
        }
        $data_up['text'] = I('post.text');
        $data_up['status'] = $_POST['status'][0];
        $data_up['updatetime'] = time();
        $data_up['parent_id'] = $parent_id;
        $data_up['url'] = I('post.url');
        $data_up['keywords'] = I('post.keywords');
        $data_up['description'] = I('post.description');
        $data_up['myorder'] = I('post.myorder');
        if ($m->create($data_up)) {
            $rs = $m->add();
            if ($rs) {
                $this->dmsg('2', '操作成功！', true);
            } else {
                $this->dmsg('1', '添加失败！', false, true);
            }
        } else {
            $this->dmsg('1', '根据表单提交的POST数据创建数据对象失败！', false, true);
        }
    }

    /**
     * update
     * 头部导航编辑后更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function updateSort() {
        $m = D('DocumentSort');
        $id = I('post.id');
        $parent_id = I('post.parent_id');
        $text = I('post.text');
        if (empty($text)) {
            $this->dmsg('1', '分类名不能为空！', false, true);
        }
        $tbname = 'DocumentSort';
        if ($parent_id != 0) {//不为0时判断是否为子分类
            if ($id == $parent_id) {
                $this->dmsg('1', '不能选择自身分类为父级分类！', false, true);
            }
            $condition_sort['id'] = array('eq', $parent_id);
            $condition_sort['path'] = array('like', '%,' . $id . ',%');
            $cun = $m->field('id')->where($condition_sort)->find(); //判断id选择是否为其的子类
            if ($cun) {
                $this->dmsg('1', '不能选择当前分类的子类为父级分类！', false, true);
            }
            //获取父级path
            $condition_pid['id'] = array('eq', $parent_id);
            $data = $m->field('path')->where($condition_pid)->find();
            $sort_path = $data['path'] . $parent_id . ','; //取得不为0时的path
            $data_up['path'] = $data['path'] . $parent_id . ',';
            updatePath($id, $sort_path, $tbname); //用于批量更新
        } else {//为0，path为,
            $condition_id['id'] = array('eq', $id);
            $data = $m->field('parent_id')->where($condition_id)->find();
            if ($data['parent_id'] != $parent_id) {//相同不改变
                $sort_path = ','; //取得不为0时的path
                updatePath($id, $sort_path, $tbname); //用于批量更新
            }
            $data_up['path'] = ','; //应该是这个
        }
        $data_up['text'] = $text;
        $data_up['status'] = $_POST['status'][0];
        $data_up['updatetime'] = time();
        $data_up['parent_id'] = $parent_id;
        $data_up['url'] = I('post.url');
        $data_up['keywords'] = I('post.keywords');
        $data_up['description'] = I('post.description');
        $data_up['myorder'] = I('post.myorder');
        $condition['id'] = array('eq', $id);
        $rs = $m->where($condition)->save($data_up);
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '2未有操作或操作失败！', false, true);
        }
    }

    /**
     * delete
     * 网站导航删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function deleteDocument() {
        $m = D('DocumentList');
        $id = I('post.id');
        if (empty($id)) {
            $this->dmsg('1', '未有id值，操作失败！', false, true);
        }
        $condition_path['path'] = array('like', '%,' . $id . ',%');
        $data = $m->field('id')->where($condition_path)->select();
        if (is_array($data)) {
            $this->dmsg('1', '该分类下还有子级分类，操作失败！', false, true);
        }
        $condition_id['id'] = array('eq', $id);
        $del = $m->where($condition_id)->delete();
        if ($del == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }
    /**
     * delete
     * 网站导航删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function deleteSort() {
        $m = D('DocumentSort');
        $id = I('post.id');
        if (empty($id)) {
            $this->dmsg('1', '未有id值，操作失败！', false, true);
        }
        $condition_path['path'] = array('like', '%,' . $id . ',%');
        $data = $m->field('id')->where($condition_path)->select();
        if (is_array($data)) {
            $this->dmsg('1', '该分类下还有子级分类，操作失败！', false, true);
        }
        $condition_id['id'] = array('eq', $id);
        $del = $m->where($condition_id)->delete();
        if ($del == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }

    /**
     * json
     * 返回json数据
     * @access index
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSort() {
        $m = D('DocumentSort');
        $list = $m->field('id,parent_id,text,status')->select();
        $navcatCount = $m->count("id");
        $a = array();
        $array = array();
        if ($list) {
            foreach ($list as $k => $v) {
                $a[$k] = $v;
                $a[$k]['_parentId'] = intval($v['parent_id']); //_parentId为easyui中标识父id
                if ($v['status'] == '20') {
                    $a[$k]['status'] = '启用';
                } elseif ($v['status'] == '10') {
                    $a[$k]['status'] = '禁用';
                }
            }
        }
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
    }

    /**
     * jsonTree
     * 头部导航返回树形json数据
     * @access add edit
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSortTree() {
        $type = I('get.type');
        $qiuyun = new \Org\Util\Qiuyun;
        $m = D('DocumentSort');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = $qiuyun->list_to_tree($tree, 'id', 'parent_id', 'children');
        if (empty($type)) {
            $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        }
        echo json_encode($tree);
    }

    /**
     * jsonTree
     * 头部导航返回树形json数据
     * @access add edit
     * @return array
     * @version dogocms 1.0
     */
    public function jsonListSortTree() {
        $sort_id = intval(trim(I('get.sort_id')));
        $type = I('get.type');
        $qiuyun = new \Org\Util\Qiuyun;
        $m = D('DocumentList');
        $condition['sort_id'] = array('eq',$sort_id);
        $tree = $m->field('id,parent_id,text')->where($condition)->select();
        $tree = $qiuyun->list_to_tree($tree, 'id', 'parent_id', 'children');
        if (empty($type)) {
            $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        }
        
        echo json_encode($tree);
    }
     /**
     * jsonListTree
     * 返回jsonListTree数据
     * @access index
     * @return array
     * @version dogocms 1.0
     */
    public function jsonListTree() {
        $m = D('DocumentList');
        $sort_id = intval(trim(I('get.sort_id')));
        $condition['sort_id'] = array('eq',$sort_id);
        $list = $m->field('id,parent_id,text,status')->where($condition)->select();
        $navcatCount = $m->count("id");
        $a = array();
        $array = array();
        if ($list) {
            foreach ($list as $k => $v) {
                $a[$k] = $v;
                $a[$k]['_parentId'] = intval($v['parent_id']); //_parentId为easyui中标识父id
                if ($v['status'] == '20') {
                    $a[$k]['status'] = '启用';
                } elseif ($v['status'] == '10') {
                    $a[$k]['status'] = '禁用';
                }
            }
        }
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
    }
    

}
