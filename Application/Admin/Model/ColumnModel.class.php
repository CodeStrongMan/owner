<?php
namespace Admin\Model;
use Think\Model;
class ColumnModel extends Model{
    protected $tableName = 'column_inc';
    #添加一个栏目数据
    public function add_col($data){
        return $this->add($data);
    }
    #查询所有数据 select
    public function select_col($parm=null){
        return $this->limit($parm)->select();
    }
    #删除数据
    public function del_col($id){
        return $this->delete($id);
    }
    #修改数据
    public function save_col($data){
        return $this->save($data);
    }
    #统计总条数
    public function count_col(){
        return $this->count();
    }
    #分类查
    public function select_side($parm){
        return $this->where($parm)->select();
    }
    #查单条
    public function find_col($id){
        return $this->where(array("id"=>$id))->find();
    }
}
?>