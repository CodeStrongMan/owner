<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        $this->display();
    }
    public function login_post(){
        $username = I("username");
        $pwd = I("password",'','md5');
        $user = M("user_inc")->where(array('username'=>$username))->find();

        if($user==''  ||  $pwd!=$user['password']){
            $this->ajaxReturn(2);
        }else{
            
            session('username',$user['username']);
            session(C('USER_AUTH_KEY'),$user['id']);
            session('last_login',date('Y-m-d H:i:s',$user['last_login']));
            session('login_ip',$user['login_ip']);
            //超级管理员识别
            if($user['username']  ==  C('RBAC_SUPERADMIN')){
                session(C('ADMIN_AUTH_KEY'),true);
            }

            //读取权限
            
            $Rbac = new \Org\Util\Rbac();
            $Rbac::saveAccessList();

            $this->ajaxReturn(1);
        } 
        
    }
    /**
     * 退出
     */
    public function do_logout(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time-1,'/');
        }
        if(session_destroy()){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(2);
        }
    }
}
?>