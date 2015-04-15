<?php
namespace Admin\Controller;

class CmsmanagerController extends PublicController{
    /******************文章管理****************************/
    public function index(){

        $Mo = D('Article');
    
        $page_th = C('page');
        $count = $Mo->count_art();
        $Page  = new \Org\Util\Page($count,10);
    
        $Page->setConfig($page_th['theme'],$page_th['page_class']);
        $list  = $Mo->select_art($Page->firstRow.','.$Page->listRows);
        $cat_list = F('article');
    
        foreach ($list as $k=>$v){
            $list[$k]['cat_id']   = $cat_list[$v['cat_id']]['title'];
            $list[$k]['dateline'] = date("Y-m-d H:i:s",$v['dateline']);
        }
        //dump($list);exit;
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }
        $this->inc   = CONTROLLER_NAME;
    
    
    
        $this->display();
    }
    
    public function article_edit(){
        $Mo   = D('Article');
        $id   = I('get.id');
        $item = $Mo->find_art($id);
        $cat_list = F('article');
    
        $this->assign('cat_list',$cat_list);
        $this->assign('item',$item);
        $this->display();
    }
    
    public function article_post(){
        $Mo     = D('Article');
        $data   = array(
            'id'      => I('post.id'),
            'cat_id'  => I('post.cat_id'),
            'title'   => I('post.title'),
            'content' => I('post.content')
        );
        if($data['id']<=0){
            $time = time();
            $data['dateline'] = time();
    
            if($Mo->add_art($data)){
                $this->AX(1);
            }else{
                $this->AX(2);
            }
        }else{
            if($Mo->save_art($data)){
                $this->AX(3);
            }else{
                $this->AX(4);
            }
        }
    }
    
    public function article_del(){
        $Mo     = D('Article');
        $id = I('get.id');
        if(I('get.do')==del){
            if($Mo->delete_art($id)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    
    }
    /*********分类**********/
    public function art_cat(){
        $Mo = D('Artcat');
        $list = $Mo->get_list();
        $result = array();
        foreach ($list as $v){
            $result[$v['id']] = $v;
        }
        F('article',$result);
        //dump($list);exit;
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            //$re['page'] = $Page->show();
            //$json = json_encode($re);
    
            $this->ajaxReturn($re);
        }
        //$this->assign('list',$list);
        $this->display();
    }
    
    public function art_cat_post(){
        $Mo   = D('Artcat');
        $data = array(
            'id'    => I('post.id'),
            'title' => I('post.title'),
            'pid'   => I('post.pid')
        );
        $tree  = $Mo->getson($data['id']);
    
        $watch = true;
        foreach ($tree as $v){
            if($data['pid'] == $v['id']||$data['pid']==$data['id']){
                $watch = false;
                break;
            }
        }
    
        if($data['id']<=0){
            if($Mo->add_artcat($data)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }else{
            if(!$watch){
                $this->ajaxReturn(5);
            }else{
                if($Mo->save_artcat($data)){
                    $this->ajaxReturn(3);
                }else{
                    $this->ajaxReturn(4);
                }
            }
        }
    }
    
    public function art_cat_del(){
        $Mo     = D('Artcat');
        $id = I('get.id');
        if($Mo->getson($id)){
            $this->ajaxReturn(3);
        }
        if(I('get.do')==del){
            if($Mo->delete_artcat($id)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
    
    
    
    /******************单页管理****************************/
    public function one_show(){
        $Mo = D('Onepage');

        $page_th = C('page');
        $count = $Mo->count_one();
        $Page  = new \Org\Util\Page($count,10);
        
        $Page->setConfig($page_th['theme'],$page_th['page_class']);
        $list  = $Mo->select_one($Page->firstRow.','.$Page->listRows);
        
        $cat_list = F('onepage');
        
        foreach ($list as $k=>$v){
            $list[$k]['code'] = $cat_list[$v['code']]['title'];
        }
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }
        $this->inc   = CONTROLLER_NAME;
        

        $this->display();
    }
    public function one_edit(){
        $Mo   = D('Onepage');
        $id   = I('get.id');
        $item = $Mo->find_one($id);
        $cat_list = F('onepage');
        
        $this->assign('cat_list',$cat_list);
        $this->assign('item',$item);
        $this->display();
    }
    public function one_post(){
        $Mo   = D('Onepage');
        $data = array(
            'id'      => I('post.id'),
            'code'    => I('post.code'),
            'title'   => I('post.title'),
            'content' => I('post.content')
        );
        if($data['id']<=0){
            $time = time();
            $data['dateline'] = date("Y-m-d H:i:s",$time);
            if($Mo->add_one($data)){
                $this->AX(1);
            }else{
                $this->AX(2);
            }       
        }else{
            if($Mo->save_one($data)){
                $this->AX(3);
            }else{
                $this->AX(4);
            }
        }
    }
    public function one_del(){
        $Mo     = D('Onepage');
        $id = I('get.id');
        if(I('get.do')==del){
            if($Mo->delete_one($id)){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
    /***************单页分类********************/
    public function one_cat(){
        $Mo      = D('Siteconfig');
        $id      = 1;
        $one_row = $Mo->find_sitecat($id);
        $center  = unserialize($one_row['content']);
        $result = array();
        foreach ($center as $v){
            $result[$v['code']] = $v;
        }
        F('onepage',$result);
        if(I('get.do')=='load'){
            foreach ($center as $v){
                $then['list'][] = $v;
            }   
            if(empty($then)){
                $then['list'] = null;
            }         
            $this->ajaxReturn($then);
        }
        //dump($center);exit;
        //$this->assign('list',$list);
        $this->display();
    }
    public function one_cat_post(){
        $Mo      = D('Siteconfig');        
        $id      = 1;
        $gid     = I('post.gid');
        $one_row = $Mo->find_sitecat($id);
        
        $arr[I('post.code')] = array(
            'code'  => I('post.code'),
            'title' => I('post.title')
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
    public function one_cat_del(){
        $Mo      = D('Siteconfig');
        $id      = 1;
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
    
    
    /******************广告管理****************************/
    public function ad_show(){
        $Mo = D('Ad');
    
        $page_th = C('page');
        $count = $Mo->count_ad();
        $Page  = new \Org\Util\Page($count,10);
    
        $Page->setConfig($page_th['theme'],$page_th['page_class']);
        $list  = $Mo->select_ad($Page->firstRow.','.$Page->listRows);
        $cat_list = F('ad');
    
        foreach ($list as $k=>$v){
            $list[$k]['code'] = $cat_list[$v['code']]['title'];
        }
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }
    
        $this->inc   = CONTROLLER_NAME;
    
    
        $this->display();
    }
    public function ad_edit(){
        $Mo   = D('Ad');
        $id   = I('get.id');
        $item = $Mo->find_ad($id);
        $cat_list = F('ad');
    
        $this->assign('cat_list',$cat_list);
        $this->assign('item',$item);
        $this->display();
    }
    
    public function ad_post(){
        $Mo     = D('Ad');
        $data   = array(
            'id'        => I('post.id'),
            'code'    => I('post.code'),
            'title'     => I('post.title'),
        );
        if(!empty($_FILES['img']['name'])){
            $info = $this->upload($_FILES['img']);
            $img_name          = $info['savename'];
            $new_path          = ltrim($info['savepath'],'.');
            $img_path          = $new_path.$img_name;
            $thmub_path        = $new_path.'thumb_'.$img_name;
            $data['img']       = $img_path;
            $data['thumb_img'] = $thmub_path;    
        }
    
        if($data['id']<=0){
            $time = time();
            $data['dateline'] = date("Y-m-d H:i:s",$time);
            if($Mo->add_ad($data)){
                $this->AX(1);
            }else{
                $this->AX(2);
            }
        }else{
            $tmp = $Mo->find_ad($data['id']);
            $old_img   = '.'.$tmp['img'];
            $old_thumb = '.'.$tmp['thumb_img'];
    
    
            if($Mo->save_ad($data)){
                if(!empty($_FILES['img']['name'])){
                    unlink($old_img);
                    unlink($old_thumb);
                    $this->AX(3);
                }else{
                    $this->AX(3);
                }
            }else{
                $this->AX(4);
            }
        }
    }
    
    public function ad_del(){
        $Mo     = D('Ad');
        $id = I('get.id');
        if(I('get.do')==del){
            $tmp = $Mo->find_ad($id);
            $old_img   = '.'.$tmp['img'];
            $old_thumb = '.'.$tmp['thumb_img'];
            if($Mo->delete_ad($id)){
                unlink($old_img);
                unlink($old_thumb);
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
    /*************广告分类****************/
    public function ad_cat(){
        $Mo      = D('Siteconfig');
        $id      = 2;
        $one_row = $Mo->find_sitecat($id);
        $center  = unserialize($one_row['content']);
        $result = array();
        foreach ($center as $v){
            $result[$v['code']] = $v;
        }
        F('ad',$result);
        if(I('get.do')=='load'){
            foreach ($center as $v){
                $then['list'][] = $v;
            }
            if(empty($then)){
                $then['list'] = null;
            }
            $this->ajaxReturn($then);
        }
    
        //dump($center);exit;
        //$this->assign('list',$list);
        $this->display();
    }
    public function ad_cat_post(){
        $Mo      = D('Siteconfig');
        $id      = 2;
        $gid     = I('post.gid');
        $one_row = $Mo->find_sitecat($id);
    
        $arr[I('post.code')] = array(
            'code'  => I('post.code'),
            'title' => I('post.title')
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
    public function ad_cat_del(){
        $Mo      = D('Siteconfig');
        $id      = 2;
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
    
    
    /******************链接管理****************************/
    public function link_show(){
        $Mo = D('Link');
    
        $page_th = C('page');
        $count = $Mo->count_link();
        $Page  = new \Org\Util\Page($count,10);
    
        $Page->setConfig($page_th['theme'],$page_th['page_class']);
        $list  = $Mo->select_link($Page->firstRow.','.$Page->listRows);
        $cat_list = F('link');
    
        foreach ($list as $k=>$v){
            $list[$k]['code'] = $cat_list[$v['code']]['title'];
        }
        if(I('get.do')=='load'){
            $re = array();
            $re['list'] = $list;
            $re['page'] = $Page->show();
            $json = json_encode($re);
            $this->ajaxReturn($re);
        }
        $this->inc   = CONTROLLER_NAME;
    
    
        $this->display();
    }
    public function link_edit(){
        $Mo   = D('Link');
        $id   = I('get.id');
        $item = $Mo->find_link($id);
        $cat_list = F('link');
    
        $this->assign('cat_list',$cat_list);
        $this->assign('item',$item);
        $this->display();
    }
    public function link_post(){
        $Mo     = D('Link');
        $data   = array(
            'id'        => I('post.id'),
            'code'      => I('post.code'),
            'title'     => I('post.title'),
            'link'      => I('post.link'),
            'content'   => I('post.content'),
            'sort'      => I('post.sort')
        );
    
        if(!empty($_FILES['thumb_img']['name'])){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  "./Public/Images/Link/";// 设置附件上传目录
            $upload->thumb = true;
            $upload->thumbMaxWidth = '50,200';
            $upload->thumbMaxHeight = '50,200';
            $upload->uploadReplace = true;
            $upload->thumbRemoveOrigin = true;
    
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->AX('99');
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
            $img_name          = $info[0]['savename'];
            $new_path          = ltrim($info[0]['savepath'],'.');
            $thmub_path        = $new_path.'thumb_'.$img_name;
            $data['thumb_img'] = $thmub_path;
        }
    
        if($data['id']<=0){
            $time = time();
            $data['dateline'] = date("Y-m-d H:i:s",$time);
            if($Mo->add_link($data)){
                $this->AX(1);
            }else{
                $this->AX(2);
            }
        }else{
            $tmp = $Mo->find_link($data['id']);
            $old_thumb = '.'.$tmp['thumb_img'];
    
    
            if($Mo->save_link($data)){
                if(!empty($_FILES['thumb_img']['name'])){
                    unlink($old_thumb);
                    $this->AX(3);
                }else{
                    $this->AX(3);
                }
            }else{
                $this->AX(4);
            }
        }
    }
    public function link_del(){
        $Mo     = D('Link');
        $id = I('get.id');
        if(I('get.do')==del){
            $tmp = $Mo->find_link($id);
            $old_thumb = '.'.$tmp['thumb_img'];
    
            if($Mo->delete_link($id)){
                unlink($old_thumb);
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
    /****************链接分类***********************/
    public function link_cat(){
        $Mo      = D('Siteconfig');
        $id      = 3;
        $one_row = $Mo->find_sitecat($id);
        $center  = unserialize($one_row['content']);
        $result = array();
        foreach ($center as $v){
            $result[$v['code']] = $v;
        }
        F('link',$result);
        if(I('get.do')=='load'){
            foreach ($center as $v){
                $then['list'][] = $v;
            }
            if(empty($then)){
                $then['list'] = null;
            }
            $this->ajaxReturn($then);
        }
        //dump($center);exit;
        //$this->assign('list',$list);
        $this->display();
    }
    public function link_cat_post(){
        $Mo      = D('Siteconfig');
        $id      = 3;
        $gid     = I('post.gid');
        $one_row = $Mo->find_sitecat($id);
    
        $arr[I('post.code')] = array(
            'code'  => I('post.code'),
            'title' => I('post.title')
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
    public function link_cat_del(){
        $Mo      = D('Siteconfig');
        $id      = 3;
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
    
    
    /******************产品管理****************************/
    public function goods_show(){
        $Mo           = D('Goods');
        $keysword     = I('get.keysword','');
        $code         = I('get.code','');
        $page_th      = C('page');
        $count        = $Mo->count_goods();
        $Page         = new \Org\Util\Page($count,9);
    
        $Page->setConfig($page_th['theme'],$page_th['page_class']);      

        if($code==''&$keysword==''){
            $list         = $Mo->select_goods($Page->firstRow.','.$Page->listRows);
        }else{
            $list         = $Mo->search_goods($keysword,$code);
        }
        
        
        $cat_list             = F('goods');
        
        foreach ($list as $k=>$v){
            $list[$k]['code'] = $cat_list[$v['code']]['title'];
        }
        if(IS_AJAX){
            if(I('get.do')=='load'){
                $re = array();
                $re['list']       = $list;
                $re['page']       = $Page->show();
                $json = json_encode($re);
                $this->ajaxReturn($re);
            }elseif(I('get.do')=='search'){
                $re = array();
                $re['list']       = $list;
                $this->ajaxReturn($re);
            }
        }
        
        $this->inc   = CONTROLLER_NAME;
        $this->assign('goods_cat',$cat_list);
        $this->display();
    }
    public function goods_edit(){
        $Mo   = D('Goods');
        $id   = I('get.id');
        $item = $Mo->find_goods($id);
        $cat_list = F('goods');
    
        $this->assign('cat_list',$cat_list);
        $this->assign('item',$item);
        $this->display();
    }
    public function goods_post(){
        $Mo     = D('Goods');
        $data   = array(
            'id'        => I('post.id'),
            'code'      => I('post.code'),
            'title'     => I('post.title'),
            'link'      => I('post.link'),
            'color'      => I('post.color'),
            'appcat'      => I('post.appcat'),
            'tag'         => I('post.tag'),
            'mode'      => I('post.mode')
        );

        if(!empty($_FILES['img']['name'])){
            $info = $this->upload($_FILES['img']);
            
            $img_name          = $info['savename'];
            $new_path          = ltrim($info['savepath'],'.');
            $img_path          = $new_path.$img_name;
            $thmub_path        = $new_path.'thumb_'.$img_name;
            $data['img']       = $img_path;
            $data['thumb_img'] = $thmub_path;
    
        }
    
        if($data['id']<=0){
            $time = time();
            $data['dateline'] = date("Y-m-d H:i:s",$time);
            if($Mo->add_goods($data)){
                $this->AX(1);
            }else{
                $this->AX(2);
            }
        }else{
            $tmp = $Mo->find_goods($data['id']);
            //var_dump($tmp);exit;
            $old_img   = '.'.$tmp['img'];
            $old_thumb = '.'.$tmp['thumb_img'];
    
    
            if($Mo->save_goods($data)){
                if(!empty($_FILES['img']['name'])){
                    unlink($old_img);
                    unlink($old_thumb);
                    $this->AX(3);
                }else{
                    $this->AX(3);
                }
            }else{
                $this->AX(4);
            }
        }
    }
    public function goods_del(){
        $Mo     = D('Goods');
        $id = I('get.id');
        if(I('get.do')==del){
            $tmp = $Mo->find_goods($id);
            $old_img   = '.'.$tmp['img'];
            $old_thumb = '.'.$tmp['thumb_img'];
            if($Mo->delete_goods($id)){
                unlink($old_img);
                unlink($old_thumb);
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
    
    
    
    /****************产品分类***********************/
    public function goods_cat(){
        $Mo      = D('Siteconfig');
        $id      = 4;
        $one_row = $Mo->find_sitecat($id);
        $center  = unserialize($one_row['content']);
        $result = array();
        foreach ($center as $v){
            $result[$v['code']] = $v;
        }
        F('goods',$result);
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
    public function goods_cat_post(){
        $Mo      = D('Siteconfig');
        $id      = 4;
        $gid     = I('post.gid');
        $one_row = $Mo->find_sitecat($id);
    
        $arr[I('post.code')] = array(
            'code'  => I('post.code'),
            'title' => I('post.title')
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
    public function goods_cat_del(){
        $Mo      = D('Siteconfig');
        $id      = 4;
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
    
    /********上传类**********/
    public function upload($file=''){
        $upload = new \Think\Upload();
        $upload->maxSize   =     3145728 ;
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath  =      './';
        $upload->savePath  =      './Public/Uploads/';
    
        $info   =   $upload->uploadOne($file);
        $image = new \Think\Image();
        $image->open($info['savepath'].$info['savename']);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
        $image->thumb(150, 150)->save($info['savepath'].'/thumb_'.$info['savename']);
        if(!$info) {
            $this->error($upload->getError());
        }else{
            return $info;
        }
    }
}