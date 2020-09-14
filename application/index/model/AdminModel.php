<?php
    namespace  app\index\model;

    use think\Db;

    class AdminModel
    {
        /**
         * 判断账号 密码 正确
         * @param $data
         * @return mixed
         */
        public function JudgeRoot($data){
            //
             return Db::name("admin")->where($data)->find();

        }

        /**
         * 注册成功 存入用户基本信息
         * @param $Data
         * @return mixed
         */
        public function Register($Data){
            $res =  Db::name('admin')->insert($Data);
            if( $res > 0){
                return true;
            }
            return false;
        }
        public function JudgeAdmin($root){
            return Db::name("admin")->where(["account"=>$root])->find();
        }
    }

?>