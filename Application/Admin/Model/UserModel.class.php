<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class UserModel extends RelationModel{
    	protected $tableName = 'user_inc';
	protected $_link = array(
	//从表
		'role' =>array(
			//多对多
			'mapping_type' => self::MANY_TO_MANY,
			'relation_table'  =>'nan_role_user',//关联表
			'foreign_key'    =>'user_id',//主表外键
			'relation_key'    => 'role_id'//从表外键

			)
	);


	public function find_user($where,$field){
	    return $this->field($field)->where($where)->find();
	}
}