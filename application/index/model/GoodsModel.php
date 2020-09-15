<?php 
    namespace app\index\Model;
    use think\Db;
    use think\Model;
    
    class GoodsModel extends Model{
        protected $tableName = 'tp_goods';
        
        /*
         * 购物车数据查询
         * @param $buyer [当前用户名]
         */
        public function shopping($buyer){
            return Db::query("SELECT a.id, a.buyer,b.name,c.configure,c.money,d.img,d.font FROM tp_goods as a LEFT JOIN tp_shopcat as b on a.pid = b.id  LEFT JOIN tp_edition as c on a.configure_id = c.id LEFT JOIN tp_color as d on a.color_id = d.id where buyer = 'admin'");
        }
        
        /*
         * 删除一条购物车
         * @param $where [条件]
         */
        public function deletes($where){
            return Db::table($this->tableName)->where($where)->delete();
        }
    }
?>