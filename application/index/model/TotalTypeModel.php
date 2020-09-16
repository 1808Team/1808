<?php
namespace app\index\Model;

use think\Db;
use think\Model;

class TotalTypeModel extends Model
{

    protected $tableName = 'tp_total_type';

    /**
     * 查询首页列表所有商品
     */
    public function selectGoodsAll()
    {
        return Db::table($this->tableName)->select();
    }

    /**
     * 查询总类型对应商品
     *
     * @param $id 查询的类型id            
     */
    public function selectTypeGoods($id)
    {
        return Db::query("SELECT a.id,b.name,b.img FROM (SELECT * FROM tp_goods_type WHERE types_id in ($id)) as a LEFT JOIN tp_shopcat as b on a.id=b.type_id");
    }
}