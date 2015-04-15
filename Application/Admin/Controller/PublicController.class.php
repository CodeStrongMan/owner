<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    Public function _initialize(){
        $this->checkLogin();
        $this->admin();
    }
    
    public function admin(){
        $Mo    = D('Column');
        
        $this->side  = $Mo->select_side(array('model'=>CONTROLLER_NAME));
        $inc         = ACTION_NAME;

        $this->assign('inck',$inc);     
    }

    public function AX($info=0){
        echo "<script>parent.AX('$info');</script>";
    }
    
    /**
     * 检查登陆
     */
    public function checkLogin(){
        /*if(!isset($_SESSION['username'])&&$_SESSION['username']==''){
            $this->redirect("Login/index");
        }*/
        if(!isset($_SESSION[C('USER_AUTH_KEY')])){
            $this->redirect("Login/login");
        }

        $notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))  || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

        if(C('USER_AUTH_ON') && !$notAuth){
            $Rbac = new \Org\Util\Rbac();
            if(!$Rbac::AccessDecision()){
                $this->error('没有权限');
            }
        }
    }
}