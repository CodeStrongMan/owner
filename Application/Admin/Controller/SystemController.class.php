<?php
namespace Admin\Controller;
class SystemController extends PublicController{
    public function index(){       
        $Mo   = D('Siteconfig');
        $id   = 5;
        $one_row = $Mo->find_sitecat($id);
        $list = unserialize($one_row['content']);
        $inc   = __MODULE__;
        //dump($list);
        
        $this->assign('list',$list);
        $this->assign('inc',$inc);
        $this->display();
    }
    public function sys_post(){
        $Mo   = D('Siteconfig');
        $id   = 5;
        $one_row = $Mo->find_sitecat($id);
        $arr = array(
            'site_name'        =>I('post.site_name'),
            'site_short'       =>I('post.site_short'),
            'site_keywords'    =>I('post.site_keywords'),
            'site_description' =>I('post.site_description'),
            'site_url'         =>I('post.site_url'),
            'site_email'       =>I('post.site_email'),
            'site_copyright'   =>I('post.site_copyright')
        );
        $content = serialize($arr);
        $data = array(
            'id'      => $id,
            'content' => $content
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

    public function onqq(){
        $Mo   = D('Siteconfig');
        $id   = 7;
        $one_row = $Mo->find_sitecat($id);
        $list = unserialize($one_row['content']);
        
        if(IS_AJAX){
            F('onqq',$list);
            $this->ajaxReturn(1);
        }
        foreach ($list as $key => $value) {
            foreach ($value as $k => $v) {
                $list[$key][$k] = implode(',', $v);
            }           
        }

        $this->theone = implode('|', $list['serviceqq']);
        $this->thetwo = implode('|', $list['skillqq']);
        $this->display();
    }

    public function qq_post(){
        if(IS_AJAX){
            $Mo   = D('Siteconfig');
            $result = array(
                    'serviceqq' => explode('|',I('serviceqq')),
                    'skillqq'       => explode('|',I('skillqq'))
                );
            foreach ($result as $key => $value) {
                foreach ($value as $k=>$v) {
                        $result[$key][$k] = explode(',',$v) ;
                }
            }

            $data = array(
                'id'      => 7,
                'content' => serialize($result)
            );
            $one_row = $Mo->find_sitecat($data['id']);
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
    }

}
?>