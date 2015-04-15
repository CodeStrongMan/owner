<?php
namespace Admin\Controller;
class FunclistController extends PublicController{
    public function index(){
        $Mo    = D('Column');
        $page_th = C('page');
        $count = $Mo->count_col();
        $Page  = new \Org\Util\Page($count,10);
        
        $Page->setConfig($page_th['theme'],$page_th['page_class']); 
        $list  = $Mo->select_col($Page->firstRow.','.$Page->listRows); 

        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }             

        $this->display(); 

    }
    
    
    public function col_edit(){
        $Mo = D('Column');
        $id = I('post.id');
        
        $data = array(
            'colname'  => I('post.colname'),
            'model'    => I('post.model'),
            'action'   => I('post.action'),
            'sort'     => I('post.sort'),
            'icon'     => I('post.icon')
        );
        

        if($id<=0){
    
            $time = time();
            $data['dateline'] = date("Y-m-d H:i:s",$time);
            if($Mo->add_col($data)){
                        $this->ajaxReturn(1);                         
            }else {
                $this->ajaxReturn(2);
            }
        }else{
            $data['id'] = $id;
            //var_dump($data);exit;
            if($Mo->save_col($data)){
                $this->ajaxReturn(3);
            }else{
                $this->ajaxReturn(4);
            }
        }
                
    }
    
    public function col_del(){
        $Mo = D('Column');
        $id = I('get.id');

        if(I('get.do')==del){
            if($Mo->del_col($id)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
        
    }
}
?>