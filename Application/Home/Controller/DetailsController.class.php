<?php 
namespace Home\Controller;

class DetailsController extends PublicController{
    public function index(){
        $Mo = M('goods_inc');
        $id = I('get.id');
        $list = $Mo->where(array('id'=>$id))->find();
        $list['tag'] = explode('/', $list['tag']);

        $cat_list   = F('goods');
        $this->assign('list',$list);
        $this->assign('cat_list',$cat_list[$list["code"]]);
        $this->display();
    }
}
?>