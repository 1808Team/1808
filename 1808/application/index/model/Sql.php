<?php 
    namespace app\index\model;
    
    use think\Model;
    use think\Db;
    
    class Sql extends Model{
        //登录
        public function sel($where){
            return Db::name('user')
            ->where($where)
            //->fetchSql()
            ->find();
        }
    }
?>