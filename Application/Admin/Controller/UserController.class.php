<?php
namespace Admin\Controller;
class UserController extends PublicController{
	public function index(){
		$user = D('User')->field('password',true)->relation(true)->select();
		
		if(I('get.do')=='load'){
			$re = array();
			$re['list'] = $user;
			$this->ajaxReturn($re);
		}
		$this->display();
	}

	public function userEdit(){
		$Mo = M('user_inc');
		$id = I('id',0);
		$this->userone = $Mo->where(array('id'=>$id))->find();
		$this->role        = M('role')->select();
		if(IS_POST){
			
			$data = array(
				'id'             => $id,
				'username' => I('username'),
				'othername' => I('othername'),
				'password'  => I('password','','md5'),
				'email'        => I('post.email'),
				'status'       => I('status')
				);

			
			if($id > 0){
				if($Mo->save($data)){
					$this->Ax(3);
				}else{
					$this->Ax(4);
				}
			}else{
				if($uid = $Mo->add($data)){
					foreach(I('role_id') as $v){
						$role[] = array(
							'role_id' =>$v,
							'user_id' => $uid 
						);
					}
					if(M('role_user')->addAll($role)){
						$this->Ax(1);
					}else{
						$this->Ax(2);
					}
				}else{
					$this->Ax(2);
				}
			}
				
	
		}
		
		$this->display();
	}

	public function delUser(){
		$Mo = M('user_inc');
		$id = I('id');

		M('role_user')->where(array('user_id'=>$id))->delete();
		if(I('get.do')==del){
			if($Mo->delete($id)){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(2);
			}
		}
	}

	public function role(){
		$Mo    = M('role');
		$count = $Mo->count();
		$Page  = new \Org\Util\Page($count,10);
		$list  = $Mo->limit($Page->firstRow.','.$Page->listRows)->select(); 

		if(I('get.do')=='load'){
			$re = array();
			$re['list'] = $list;
			$re['page'] = $Page->show();
			$this->ajaxReturn($re);
		}   
		$this->display();
	}

	public function addRole(){
		$Mo = M('role');
		$id = I('id');
		if($id==0){
			if($Mo->add(I('post.'))){
				$this->ajaxReturn(1); 
			}else{
				$this->ajaxReturn(2); 
			}
		}else{
			if($Mo->save(I('post.'))){
				$this->ajaxReturn(3); 
			}else{
				$this->ajaxReturn(4); 
			}
		}
		
	}

	public function delRole(){
		$Mo = M('role');
		$id = I('id');

		if(I('get.do')==del){
			if($Mo->delete($id)){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(2);
			}
		}
	}

	public function node(){
		$node = M('node')->select();
		$node = nodeMerge($node);
		if(I('get.do')=='load'){
			$re = array();
			$re['list'] = $node;
			$this->ajaxReturn($re);
		}
		//p($node);die;
		$this->display();
	}
	public function addNode(){
		$Mo = M('node');
		$id = I('id');
		if($id==0){
			if($Mo->add(I('post.'))){
				$this->ajaxReturn(1); 
			}else{
				$this->ajaxReturn(2); 
			}	
		}else{
			if($Mo->save(I('post.'))){
				$this->ajaxReturn(3); 
			}else{
				$this->ajaxReturn(4); 
			}
		}
		
	}
	public function delNode(){
		$Mo = M('node');
		$id = I('id');
		M('access')->where(array('node_id'=>$id))->delete();
		if(I('get.do')==del){
			if($Mo->delete($id)){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(2);
			}
		}
	}

	public function access(){
		$rid = I('rid',0,'intval');
		$field = array('id','name','title','pid');
		$node = M('node')->field($field)->order('sort')->select();
		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);

		$this->node = nodeMerge($node,$access);
		$this->rid = $rid;
		$this->display();	
	}

	public function setAccess(){
		$rid = I('rid',0,'intval');
		$Mo = M('access');

		$data = array();
		foreach(I('post.access') as $v){
			$tmp = explode('_',$v);
			$data[] = array(
				'role_id' =>$rid,
				'node_id' =>$tmp[0],
				'level' => $tmp[1]
				);
		}
		$Mo->where(array('role_id' => $rid))->delete();
		if($Mo->addAll($data)){
			$this->AX(1);
		}else{
			$this->AX(2);
		}
	}
}
?>