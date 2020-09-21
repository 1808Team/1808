<?php
    namespace  app\index\model;

    use think\Db;

    class SelfinfoModel
    {
		 
        public function selects($id){
             return Db::name("admin")->where('id',$id)->find();
        }
		public function updates($where,$data){
			return Db::name("admin")->where($where)->update($data);
		}
    }

?>