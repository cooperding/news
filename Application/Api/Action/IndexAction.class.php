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
class IndexAction extends BaseApiAction {

    /**
     * getSortList
     * 获取分类列表 
     * @access public
     * @param string $token token
     * @param string $key apikey
     * @param string $id id
     * @return json
     * /api/index/getSortList/token/4c5d9364d77af738be03491570c42839/key/19d68892443dcb5e25abb0dc56f27133/id/1
     */
    public function getSortList() {
        echo time();
        exit;
    }

    /**
     * getDataList
     * 获取列表数据 
     * @access public
     * @param string $token token
     * @param string $key apikey
     * @param string $id id
     * @return json
     * /api/index/getDataList/token/4c5d9364d77af738be03491570c42839/key/19d68892443dcb5e25abb0dc56f27133/id/1
     */
    public function getDataList() {
        $id = I('post.id');//id为空不存在
        $flag = I('post.flag');//flag 属性
        $pagerow = I('post.pagerow');//pagerow 当前页面数据总条数
        $limitrow = I('post.limitrow');//limitrow 调用条数
        $t = D('Title');
        //id为空不存在
        if (!empty($id)) {
            $ns = D('NewsSort');
            $condition_sort['path'] = array('like', '%,' . $id . ',%');
            $condition_sort['id'] = array('eq', $id);
            $condition_sort['_logic'] = 'OR';
            $sort_data = $ns->where($condition_sort)->select();
            foreach ($sort_data as $k => $v) {
                $sort_id .= $v['id'] . ',';
            }
            $sort_id = rtrim($sort_id, ', ');
            $condition['t.sort_id'] = array('in', $sort_id);
        }
        //flag 属性
        if(!empty($flag)){
            $condition['t.flag'] = array('like',$flag);
        }
        //pagerow 当前页面数据总条数
        if(!empty($pagerow)){
            
        }
        
        $condition['t.status'] = array('eq', '12');
        $count = $t->Table(C('DB_PREFIX') . 'title t')
                        ->where($condition)->count();
        //limitrow 调用条数
        if(empty($limitrow)){
           $limitrow = 8; 
        }
        $page = new \Org\Util\QiuyunPage($count, $limitrow); // 实例化分页类 传入总记录数和每页显示的记录数
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->Table(C('DB_PREFIX') . 'title t')
                ->join(C('DB_PREFIX') . 'news_sort ns ON ns.id = t.sort_id ')
                ->where($condition)
                ->field('t.*,ns.text')
                ->order('t.id desc')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        $siteurl = R('Common/System/getCfg', array('cfg_siteurl'));
        foreach ($list as $k=>$v){
            $list[$k]['titlepic'] =  $siteurl. $v['titlepic'];
        }
        $array['list'] = $list;
        $array['total'] = $count;
        $array['pagerow'] = 8;
        $array['error'] = 0;//成功
        $array['msg'] = '成功';
        echo json_encode($array);
    }

    /**
     * getContent
     * 获取内容信息
     * @access public
     * @param string $token token
     * @param string $key apikey
     * @param string $id id
     * @return json
     * /api/index/getContent/token/4c5d9364d77af738be03491570c42839/key/19d68892443dcb5e25abb0dc56f27133/id/1
     */
    public function getContent() {
        $id = I('post.id');
        $t = D('Title');
        $condition['t.id'] = array('eq', $id);
        $condition['t.status'] = array('eq', '12'); //12已审核
        $condition['t.is_recycle'] = array('eq', '10'); //10未加入回收站
        $data = $t->field(array('t.*', 'c.*'))
                ->Table(C('DB_PREFIX') . 'title t')
                ->join(C('DB_PREFIX') . 'content c ON c.title_id = t.id ')
                ->field('t.*,c.content')
                ->where($condition)
                ->find();
        if ($data) {
            $data['titlepic'] = R('Common/System/getCfg', array('cfg_siteurl')) . $data['titlepic'];
            //浏览量赋值+1
            $condition_id['id'] = array('eq', $id);
            $t->where($condition_id)->setInc('views', 1);
            $data['content'] = stripslashes($data['content']);
        }
        $data['error'] = 0;
        $data['msg'] = '获取数据成功！';
        echo json_encode($data);
        exit;
    }

}
