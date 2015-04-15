<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    protected $tableName = 'goods_inc';
    #查总条数
    public function count_goods(){
        return $this->count();
    }
    
    //搜索查询
    public function search_goods($keysword='',$code=''){
        if($keysword!==''&&$code!==''){
            $sql = "SELECT * FROM `nan_goods_inc` WHERE `code`='$code' AND (`title` like '%$keysword%' OR `mode` like '%$keysword%')";
        }else if($keysword!==''){
            $sql = "SELECT * FROM `nan_goods_inc` WHERE `title` like '%$keysword%' OR `mode` like '%$keysword%'";
        }else if($code!==''){
            $sql = "SELECT * FROM `nan_goods_inc` WHERE `code`='$code'";
        }
        
        return $this->query($sql);
    }
    #查列表
    public function select_goods($parm='null',$map=''){
    return $this->where($map)->limit($parm)->select();
    }
    #查单条数据
    public function find_goods($id){
    return $this->where(array('id'=>$id))->find();
    }
    #修改数据
    public function save_goods($data){
    return $this->save($data);
    }
    #删除数据
    public function delete_goods($id){
    return $this->delete($id);
    }
    #增加文章
    public function add_goods($data){
    return $this->add($data);
    }
}