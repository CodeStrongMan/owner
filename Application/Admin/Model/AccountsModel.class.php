<?php
namespace Admin\Model;
use Think\Model;
class AccountsModel extends Model{
    protected $tableName = 'accounts_inc';
    public function add_serial($data){
        return $this->add($data);
    }
    public function select_serial(){
        return $this->order(array('dateline'=>'desc'))->select();
    }
    public function count_serial(){
        return $this->count();
    }

}
?>