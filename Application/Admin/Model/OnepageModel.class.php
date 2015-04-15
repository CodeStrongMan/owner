<?php
namespace Admin\Model;
use Think\Model;
class OnepageModel extends Model{
    protected $tableName = 'onepage_inc';
    #添加单页
    public function add_one($data){
        return $this->add($data);
    }
    #统计和
    public function count_one(){
        return $this->count();
    }
    #查数据列表
    public function select_one($parm='null'){
        return $this->limit($parm)->select();
    }
    #查单条数据
    public function find_one($id){
        return $this->where(array('id'=>$id))->find();
    }
    #修改数据
    public function save_one($data){
        return $this->save($data);
    }
    #删除数据
    public function delete_one($id){
        return $this->delete($id);
    }
}
?>