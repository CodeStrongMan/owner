<?php
namespace Admin\Controller;
class AlldataController extends PublicController{
    public function index(){
        $Mo       = D('Accounts');
        $list     = $Mo->select_serial();
        $count    = $Mo->count_serial();
        $Page     = new \Org\Util\Page($count,10);
        $cat_list = F('bank');
        
        foreach ($list as $k=>$v){
            $list[$k]['code'] = $cat_list[$v['code']]['bank'].'--'.$cat_list[$v['code']]['bankusername'];
            $list[$k]['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
        }
    	if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
         }
        	$this->display();
    }
    public function serial_edit(){

    	$this->cat = F('bank');

    	$this->display();
    }
    public function serial_post(){
    	$Mo = D('Accounts');
    	$data = I("post.");
    	$data["serial"]    = "PJ".time().rand(1000,9999);
    	$data["ip"]         = get_client_ip();
    	$data["dateline"] = time(); 
    	if($Mo->add_serial($data)){
    		$this->AX(1);
    	}else{
    		$this->AX(2);
    	}
    }
    public function serial_cat(){
        $Mo      = D('Siteconfig');
        $id      = 6;
        $one_row = $Mo->find_sitecat($id);
        $center  = unserialize($one_row['content']);
        $result = array();
        foreach ($center as $v){
            $result[$v['code']] = $v;
        }
        F('bank',$result);
        if(I('get.do')=='load'){
            foreach ($center as $v){
                $then['list'][] = $v;
            }   
            if(empty($then)){
                $then['list'] = null;
            }         
            $this->ajaxReturn($then);
        }

        $this->display();
    }
    public function serial_cat_post(){
    	$Mo      = D('Siteconfig');        
        $id      = 6;
        $gid     = I('post.gid');
        $one_row = $Mo->find_sitecat($id);
        
        $arr[I('post.code')] = array(
            'code'  => I('post.code'),
            'bankusername' => I('post.bankusername'),
            'bankuser' => I('post.bankuser'),
            'bank' => I('post.bank'),
        );
        
        if(!empty($one_row)){
            if(empty($gid)){
                $center = unserialize($one_row['content']);
                $arr    = array_merge($center,$arr);
                unset($arr[$gid]);
            }else{           
                $center = unserialize($one_row['content']);
                $arr    = array_merge($center,$arr);   
            }        
        } 
      
        
        $str = serialize($arr);
        $data = array(
            'id'      => $id,
            'content' => $str
        );        

        if(empty($one_row)){
            if($Mo->add_sitecat($data)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }else{
            
            if($Mo->save_sitecat($data)){
                $this->ajaxReturn(3);
            }else{
                $this->ajaxReturn(4);
            }
        }
    }
    public function serial_cat_del(){
        $Mo      = D('Siteconfig');
        $id      = 6;
        $code    = I('get.code');
        $one_row = $Mo->find_sitecat($id);
        $center = unserialize($one_row['content']);
        
        unset($center[$code]);
        //var_dump($center);exit;
        $new_center = serialize($center);
        $data = array(
            'id'      => $id,
            'content' => $new_center
        );
        if($Mo->save_sitecat($data)){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(2);
        }
        
    }

}