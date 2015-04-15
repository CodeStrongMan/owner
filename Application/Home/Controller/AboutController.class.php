<?php 
namespace Home\Controller;

class AboutController extends PublicController{
    public function index(){
        $Mo = M('onepage_inc');
        $list = $Mo->field('content')->where(array('code'=>'content_page'))->find();
        //dump($list);
        $this->assign('list',$list);
        $this->display();
    }
    public function mony(){
        $this->display();
    }
    public function joinus(){
        $this->zhaopin = M('onepage_inc')->where(array('code'=>'zhaopin_page'))->select();
        //dump($zhaopin);
        $this->display();
    }
}