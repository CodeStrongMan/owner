<?php 
namespace Home\Controller;

class ProductController extends PublicController{

    public function index(){
        $Mo    = M('goods_inc');
        $theType  = I('type');
        $theColor  = I('color');
        $theCode  = I('code');
        $keywords = I('keywords');
        $cat_list   = F('goods');
        

     /*    if(!empty($theCode)&&!empty($theColor)&&!empty($theType)){
            $count      = $Mo->where($where)->count();// 查询满足要求的总记录数
        }else{
            $count      = $Mo->count();// 查询满足要求的总记录数
        } */
        if(!empty($theCode)&&!empty($theColor)&&!empty($theType)){
            $where['code'] = array('eq',$theCode);
            $where['color'] = array('eq',$theColor);
            $where['type'] = array('eq',$theType);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theCode)&&!empty($theColor)){
            $where['code'] = array('eq',$theCode);
            $where['color'] = array('eq',$theColor);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theCode)&&!empty($theType)){
            $where['code'] = array('eq',$theCode);
            $where['type'] = array('eq',$theType);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theColor)&&!empty($theType)){
            $where['color'] = array('eq',$theColor);
            $where['type'] = array('eq',$theType);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theCode)){
            $where['code'] = array('eq',$theCode);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theColor)){
            $where['color'] = array('eq',$theColor);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($theType)){
            $where['type'] = array('eq',$theType);
            $count      = $Mo->where($where)->count();
        }elseif (!empty($keywords)){
            $where['tag'] = array('like',"%$keywords%");
            $count      = $Mo->where($where)->count();
        }else{
            $count      = $Mo->count();
        }
        $Page       = new \Org\Util\Page($count,9);
        $show       = $Page->show();// 分页显示输出
        

        if(!empty($theCode)&&!empty($theColor)&&!empty($theType)){
            $where['code'] = array('eq',$theCode);
            $where['color'] = array('eq',$theColor);
            $where['type'] = array('eq',$theType);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theCode)&&!empty($theColor)){
            $where['code'] = array('eq',$theCode);
            $where['color'] = array('eq',$theColor);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theCode)&&!empty($theType)){
            $where['code'] = array('eq',$theCode);
            $where['type'] = array('eq',$theType);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theColor)&&!empty($theType)){
            $where['color'] = array('eq',$theColor);
            $where['type'] = array('eq',$theType);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theCode)){
            $where['code'] = array('eq',$theCode);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theColor)){
            $where['color'] = array('eq',$theColor);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($theType)){
            $where['type'] = array('eq',$theType);
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }elseif (!empty($keywords)){
            $where['tag'] = array('like',"%$keywords%");
            $list = $Mo->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            $list = $Mo->limit($Page->firstRow.','.$Page->listRows)->select();
        }
       //echo $Mo->getLastSql();
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

    
    
}
?>