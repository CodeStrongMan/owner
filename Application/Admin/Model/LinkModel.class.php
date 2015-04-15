<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model{
    protected $tableName = 'link_inc';
    #增加文章
    public function add_link($data){
        return $this->add($data);
    }
    #查总条数
    public function count_link(){
    return $this->count();
    }
    #查列表
    public function select_link($parm='null'){
    return $this->limit($parm)->select();
    }
    #查单条数据
    public function find_link($id){
    return $this->where(array('id'=>$id))->find();
    }
    #修改数据
    public function save_link($data){
    return $this->save($data);
    }
    #删除数据
    public function delete_link($id){
    return $this->delete($id);
    }
}
?>