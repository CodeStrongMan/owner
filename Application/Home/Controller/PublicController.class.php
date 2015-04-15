<?php 
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function _initialize(){
        $this->site();
    }
    
    public function site(){
        $link    = M('link_inc');
        $Mo      = M('onepage_inc');
        $Do      = M('siteconfig_inc');
        $rect    = $link->where(array('code'=>'top_nav'))->order(array('sort'=>'asc'))->select();
        $res     = $this->rock($rect);

        $tmp    = $Do->field('content')->where(array('id'=>5))->find();
        $site   = unserialize($tmp['content']);
        $this->onqq = F('onqq');

        $this->assign('res',$res);
        $this->assign('site',$site);

    }
    
    public function rock($arr){
        $result = array();
        foreach ($arr as $val){
            $val['content'] = explode('*',$val['content']);
            foreach ($val['content'] as $k2=>$item){        
                $val['content'][$k2] = explode('|',$item);

            }
            $result[$val['id']] = $val;
        }
        return $result;
    }

    public function _empty(){
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
        $this->display("Public:404");
    }
}
?>