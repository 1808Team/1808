<?php
    namespace  app\index\model;

    use think\Db;

    class SelfinfoModel
    {
        public function selects($id){
             return Db::name("admin")->where('id',$id)->find();

        }
    }

?>