<?php
namespace Admin\Model;
use Think\Model;
class AdModel extends Model{
    protected $tableName = 'ad_inc';
    #查总条数
    public function count_ad(){
        return $this->count();
    }
    #查列表
    public function select_ad($parm='null'){
        return $this->limit($parm)->select();
    }
    #查单条数据
    public function find_ad($id){
        return $this->where(array('id'=>$id))->find();
    }
    #修改数据
    public function save_ad($data){
        return $this->save($data);
    }
    #删除数据
    public function delete_ad($id){
        return $this->delete($id);
    }
    #增加文章
    public function add_ad($data){
        return $this->add($data);
    }
}
?>