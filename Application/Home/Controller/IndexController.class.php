<?php
namespace Home\Controller;

class IndexController extends PublicController {
    public function index(){
        $Mo   = M('article_inc');
        $Go   = M('goods_inc');
        $list = $Mo->field('id,cat_id,title,dateline')->order(array('dateline'=>'desc'))->select();
        $result = array();
        foreach ($list as $v){
            $result[$v['cat_id']][] = $v;
        }
        $this->hotGoods = $Go->limit(12)->select();
        //dump($hotGoods);


        $this->assign('result',$result);
        $this->display();
    }
}