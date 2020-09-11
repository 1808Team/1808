<?php
    namespace app\index\model;

    use think\Db;
	use think\Model;

    class Shopcat extends Model
    {
		//查询全部商品
        public function ShowData($where=null,$table='shopcat'){
            return $result = Db::name($table)->where($where)->select();
        }
		//查询单个商品
		public function queryGoodsFind($where=null,$table='shopcat'){
			return $result = Db::name($table)->where($where)->find();
		}
		//获取配置
		public function queryEditionData($where=null,$table='edition'){
			return $result = Db::name($table)->where($where)->select();
		}
		 // 查询单个商品颜色
		public function queryColorData($where = null,$table='color')
		{
			return Db::name($table)->where($where)->select();
		}
		// 加入购物车
		public function insertShopping($data=null,$table='goods')
		{
			return Db::name($table)->insert($data);
		}
		  // 查询购物车单个数据
		public function queryShoppingFirst($where = null,$table="goods")
		{
			return Db::name($table)->where($where)->find();
		}

    }
?>