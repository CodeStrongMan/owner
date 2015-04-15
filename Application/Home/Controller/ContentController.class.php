<?php 
namespace Home\Controller;

class ContentController extends PublicController{
    public function index(){
        $Mo     = M('article_inc');

        $id     = I('get.id');
        $result = $Mo->where(array('id'=>$id))->find();
        $cat_list = F('article');
        $result['cat_name'] = $cat_list[$result['cat_id']]['title'];
        
        //dump($result);
        $this->assign('result',$result);
        $this->assign('cat_list',$cat_list);
        $this->display();
    }
}