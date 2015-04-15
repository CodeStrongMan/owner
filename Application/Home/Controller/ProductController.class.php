<?php 
namespace Home\Controller;

class ProductController extends PublicController{
    public function index(){
        $Mo    = M('goods_inc');
        $code       = I('get.code');

        if(!empty($code)){
            $count      = $Mo->where(array('code'=>$code))->count();// 查询满足要求的总记录数
        }else{
            $count      = $Mo->count();// 查询满足要求的总记录数
        }
        $Page       = new \Org\Util\Page($count,9);
        $show       = $Page->show();// 分页显示输出
        $cat_list   = F('goods');

        if(!empty($code)){
            $list = $Mo->where(array('code'=>$code))->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            $list = $Mo->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        foreach ($list as $k=>$v){
            $list[$k]['code_title'] = $cat_list[$v['code']]['title'];
        }
        //dump($list);
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }


        $this->assign('goods_cat',$cat_list);
        

        $this->display();
    }

    public function server(){
        $this->display();
    }
    
}
?>