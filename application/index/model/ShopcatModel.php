<?php
    namespace app\index\model;

    use think\Db;
	use think\Model;

    class ShopcatModel extends Model
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

		//购买商品
		public function buy($editino_id,$color_id){
            $res_color = Db::name('color')->where("id=$color_id")->find();
            if($res_color['kucun'] < 1){
                return 2;   //库存不足
            }
            $res_goods = Db::name('edition')
                        ->where("id=$editino_id")
                        ->field('id edition_id,goods_id,money price')
                        ->find();
            $res_goods['color_id'] = $color_id;
            $res_goods['buy_time'] = date('Y-m-d H:i:s',time());
            $res = Db::name('buy')->insert($res_goods);
            if($res){
               $res_kucun = Db::name('color')->where("id=$color_id")->update(['kucun'=>$res_color['kucun']-1]);
               if($res_kucun){
                   return 1;   //购买成功
               }else{
                   return 3;   //购买失败
               }
            }else{
                return 3;   //购买失败
            }
        }

    }
?>