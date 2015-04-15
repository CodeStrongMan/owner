<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
    protected $tableName = 'article_inc';
    #增加文章
    public function add_art($data){
        return $this->add($data);
    }
    #查总条数
    public function count_art(){
        return $this->count();
    }
    #查列表
    public function select_art($parm='null'){
        return $this->limit($parm)->order(array('dateline'=>'desc'))->select();
    }
    #查单条数据
    public function find_art($id){
        return $this->where(array('id'=>$id))->find();
    }
    #修改数据
    public function save_art($data){
        return $this->save($data);
    }
    #删除数据
    public function delete_art($id){
        return $this->delete($id);
    }
}
?>