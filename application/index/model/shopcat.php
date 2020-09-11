<?php
    namespace app\index\model;

    use think\Db;

    class shopcat
    {
        public function ShowData($where,$table='shopcat'){
            return $result = Db::name($table)->where($where)->select();
        }
    }
?>