<?php
namespace Admin\Model;
use Think\Model;
class SiteconfigModel extends Model{
    protected $tableName = 'siteconfig_inc';
    #加数据
    public function add_sitecat($data){
        return $this->add($data);
    }
    #查单条数据
    public function find_sitecat($id){
        return $this->where(array('id'=>$id))->find();
    }
    #更新数据
    public function save_sitecat($data){
        return $this->save($data);
    }
    
}
?>