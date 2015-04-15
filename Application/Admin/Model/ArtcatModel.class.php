<?php
namespace Admin\Model;
use Think\Model;
class ArtcatModel extends Model{
    protected $tableName = 'artcat_inc';
    #添加数据
    public function add_artcat($data){
        return $this->add($data);
    }
    #无限极分类
    public function treelist($arr,$parent_id=0,$lev=0){
        $tree = array();
        foreach($arr as $v){        	
        	if($v['pid']==$parent_id){
        		$v['lev'] = str_repeat('　',$lev);
        		$tree[]=$v;
        		$tree=array_merge($tree,self::treelist($arr,$v['id'],$lev+1));
        	}
        }
        return $tree;
    }
    #修改数据
    public function save_artcat($data){
        return $this->save($data);
    }
    #删除数据
    public function delete_artcat($id){
        return $this->delete($id);
    }
    /*检测分类下是否有子分类*/
    public function getson($id){
        return $this->where(array('pid'=>$id))->select();
    }
    
    #查单条数据
    public function find_artcat($id){
        return $this->where(array('id'=>$id))->find();
    }
    #查总条数
    public function count_artcat(){
        return $this->count();
    }
    #查列表
    public function select_artcat($parm='null'){
        $arr = $this->limit($parm)->select();
        return $this->treelist($arr);
    }
    #查表2
    public function get_list(){
        $arr = $this->select();
        return $this->treelist($arr);
    }
}
?>