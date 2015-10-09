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
     * getSearchList
     * 获取搜索列表 
     * @access public
     * @param string $token token
     * @param string $key apikey
     * @param string $wd wd
     * @return json
     * api/index/getSearchList/token/70be83b9cbdd84cb5d5642aa0ab601c0/key/19d68892443dcb5e25abb0dc56f27133/id//flag/h/limitrow/6/pagerow/0/
     */
    public function getSearchList() {
        $t = D('Title');
        $wd = I('post.id'); //搜索关键词
        $totalrow = I('post.pagerow'); //pagerow 当前页面数据总条数
        $loadtype = I('post.loadtype'); //加载状态；load普通加载；loadup上拉加载更多，refresh刷新加载
        $condition['title'] = array('like', '%' . $wd . '%');
        $condition['status'] = array('eq', '12');
        $count = $t->where($condition)->count();
        $pagerow = 10; //每页调用条数
            if ($loadtype == 'load') {//普通加载页面0，$totalrow总条数
                if (!empty($totalrow)) {
                    $limit = '0,' . $totalrow;
                } else {
                    $limit = '0,' . $pagerow;
                }
            } elseif ($loadtype == 'loadup') {
                $num = $count - $totalrow;
                if ($num <= 0) {
                    $array['error'] = 200; //成功
                    $array['msg'] = '数据已全部加载';
                    echo json_encode($array);
                    exit;
                }
                if ($num <= $pagerow) {
                    $pagerow = $num;
                }
                $limit = $totalrow . ',' . $pagerow;
            }//if
        
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->where($condition)
                ->field('*')
                ->order('id desc')
                ->limit($limit)
                ->select();
        $siteurl = R('Common/System/getCfg', array('cfg_siteurl'));
        foreach ($list as $k => $v) {
            $list[$k]['titlepic'] = $siteurl . $v['titlepic'];
        }
        $array['list'] = $list;
        $array['pagetotal'] = $totalrow;//当前页面条数
        $array['totalcount'] = $count;//总条数
        $array['pagerow'] = $pagerow;
        $array['error'] = 0; //成功
        $array['msg'] = '成功';
        echo json_encode($array);
    }

    /**
     * getDataList
     * 获取列表数据 
     * @access public
     * @param string $token token
     * @param string $flag flag
     * @param string $id id
     * @param string $pagerow pagerow
     * @param string $limitrow limitrow
     * @return json
     * /api/index/getDataList/token/4c5d9364d77af738be03491570c42839/key/19d68892443dcb5e25abb0dc56f27133/id/1
     */
    public function getDataList() {
        $id = I('post.id'); //id为空不存在
        $flag = I('post.flag'); //flag 属性
        $totalrow = I('post.pagerow'); //pagerow 当前页面数据总条数
        $limitrow = I('post.limitrow'); //limitrow 调用条数
        $loadtype = I('post.loadtype'); //加载状态；load普通加载；loadup上拉加载更多，refresh刷新加载
//        $id = 0; //id为空不存在
//        $flag = ''; //flag 属性
//        $totalrow = 0; //pagerow 当前页面数据总条数
//        $limitrow = 0; //limitrow 调用条数
//        $loadtype = 'loadup'; //加载状态；load普通加载；loadup上拉加载更多，refresh刷新加载

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
        if (!empty($flag)) {
            $condition['t.flag'] = array('like', '%' . $flag . '%');
        }
        $condition['t.status'] = array('eq', '12');
        $count = $t->Table(C('DB_PREFIX') . 'title t')
                        ->where($condition)->count();
        $pagerow = 10; //每页调用条数
        if ($limitrow) {//存在限制条数
            $limit = '0,' . $limitrow;
        } else {
            if ($loadtype == 'refresh') {//刷新页面0，$totalrow总条数
                $limit = '0,' . $totalrow;
            } elseif ($loadtype == 'load') {//普通加载页面0，$totalrow总条数
                if (!empty($totalrow)) {
                    $limit = '0,' . $totalrow;
                } else {
                    $limit = '0,' . $pagerow;
                }
            } elseif ($loadtype == 'loadup') {
                $num = $count - $totalrow;
                if ($num <= 0) {
                    $array['error'] = 200; //成功
                    $array['msg'] = '数据已全部加载';
                    echo json_encode($array);
                    exit;
                }
                if ($num <= $pagerow) {
                    $pagerow = $num;
                }
                $limit = $totalrow . ',' . $pagerow;
            }//if
        }
        //echo '<br/>';
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $t->Table(C('DB_PREFIX') . 'title t')
                ->join(C('DB_PREFIX') . 'news_sort ns ON ns.id = t.sort_id ')
                ->where($condition)
                ->field('t.*,ns.text')
                ->order('t.id desc')
                ->limit($limit)
                ->select();
        $siteurl = R('Common/System/getCfg', array('cfg_siteurl'));
        foreach ($list as $k => $v) {
            $list[$k]['titlepic'] = $siteurl . $v['titlepic'];
        }
        $array['list'] = $list;
        $array['pagetotal'] = $totalrow;//当前页面条数
        $array['totalcount'] = $count;//总条数
        $array['pagerow'] = $pagerow;
        $array['error'] = 0; //成功
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
