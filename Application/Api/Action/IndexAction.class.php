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
        echo time();
        exit;
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
