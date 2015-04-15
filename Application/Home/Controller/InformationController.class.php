<?php 
namespace Home\Controller;

class InformationController extends PublicController{
    public function index(){
        $Mo   = M('article_inc');

        
        $count      = $Mo->where(array('cat_id'=>C('TECHNOLOGY_INFORMATION')))->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $this->pagebar       = $Page->show();// 分页显示输出
        $this->list = $Mo->where(array('cat_id'=>C('TECHNOLOGY_INFORMATION')))->order(array('dateline'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();                
        $this->display();
    }
    public function line(){
        $Mo                      = M('article_inc');
        $count                   = $Mo->where(array('cat_id'=>C('INDUSTRY_INFORMATION')))->count();// 查询满足要求的总记录数
        $Page                   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $this->pagebar      = $Page->show();// 分页显示输出
        $this->list              = $Mo->where(array('cat_id'=>C('INDUSTRY_INFORMATION')))->order(array('dateline'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->display();
    }

}