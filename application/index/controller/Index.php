<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\ShopcatModel;

class Index extends Controller
{

    protected $ShopcatModel;

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->ShopcatModel))
            $this->ShopcatModel = new ShopcatModel();
    }

    public function index()
    {
        //
        $rows = $this->ShopcatModel->ShowData(null);
        $this->assign("root", session('root'));
        $this->assign("rows", $rows);
        
        // 首页列表所有商品
        $TotalTypeModel = new \app\index\Model\TotalTypeModel();
        $result = $TotalTypeModel->selectGoodsAll();
        
        $arr1 = [];
        $arr2 = [];
        
        foreach ($result as $key => $val) {
            if ($result[$key]['types'] == 0) {
                $arr1[] = $result[$key];
            } else {
                $arr2[] = $result[$key];
            }
        }
        
        foreach ($arr1 as $key2 => $val2) {
            $arrs = [];
            foreach ($arr2 as $k => $v) {
                if ($result[$key2]['type_id'] == $arr2[$k]['types']) {
                    $arrs[] = $arr2[$k];
                }
            }
            $arr1[$key2]['types'] = $arrs;
        }
        foreach ($arr1 as $keys => $vals) {
            $arrs2 = [];
            foreach ($arr1[$keys]['types'] as $a => $b) {
                $arrs2[] = $arr1[$keys]['types'][$a]['type_id'];
            }
            $ids = implode(',', $arrs2);
            $res = $TotalTypeModel->selectTypeGoods($ids);
            $arr1[$keys]['resArr'] = $res;
        }
        
        $this->assign("goodsAll", $arr1);

        //导航栏
        $obj = new ShopcatModel();
        $res = $obj->selectLiebiao();
        $this->assign('res',$res);

        return $this->fetch("./index");
    }

    // 渲染详情页
    public function details()
    {
        $id = input('id');
        if (empty($id)) {
            $this->error("数据错误", "/index/index/index");
        }
        $where = [
            'id' => $id
        ];
        $goodsFind = $this->ShopcatModel->queryGoodsFind($where);
        
        $where2 = [
            "goods_id" => $id
        ];
        $editionData = $this->ShopcatModel->queryEditionData($where2);
        $count = 0;
        foreach ($editionData as $k => &$v) {
            $v['count'] = $count;
            $count ++;
        }
        unset($count);
        $this->assign("goodsFind", $goodsFind);
        $this->assign("editionData", $editionData);
        return $this->fetch("./xiangqing");
    }

    // 查询商品的颜色
    public function color()
    {
        if (request()->isAjax()) {
            $id = input('id');
            if (empty($id)) {
                return json([
                    'code' => 1,
                    'msg' => '数据错误',
                    'data' => ''
                ]);
            }
            $where = [
                'pid' => $id
            ];
            $colorData = $this->ShopcatModel->queryColorData($where);
            if (count($colorData) != 0) {
                $count = 0;
                foreach ($colorData as $k => &$v) {
                    $v['count'] = $count;
                    $count ++;
                }
                unset($count);
                return json([
                    'code' => 0,
                    'msg' => '获取成功',
                    'data' => $colorData
                ]);
            } else {
                return json([
                    'code' => 1,
                    'msg' => '暂时没有颜色',
                    'data' => ""
                ]);
            }
        }
    }

    public function goods()
    {
        if (request()->isAjax()) {
            $editionid = input('editionid'); // 配置id
            $colorid = input('colorid'); // 颜色id
            $id = input('id'); // 商品id
            if (empty($editionid) || empty($colorid) || empty($id)) {
                return json([
                    'code' => 1,
                    'msg' => '数据错误',
                    'data' => ''
                ]);
            }
            $where = [
                'configure_id' => $editionid,
                'color_id' => $colorid,
                'pid' => $id,
                'buyer' => session('root')
            ];
            $count = $this->ShopcatModel->queryShoppingFirst($where);
            if (! empty($count)) {
                return json([
                    'code' => 1,
                    'msg' => '你的购物车已经有此宝贝了',
                    'data' => ''
                ]);
            }
            $data = [
                'buyer' => session('root'),
                'pid' => $id,
                'configure_id' => $editionid,
                'color_id' => $colorid,
                'purchase_time' => date('Y-m-d H:i:s', time())
            ];
            $rows = $this->ShopcatModel->insertShopping($data);
            if ($rows) {
                return json([
                    'code' => 0,
                    'msg' => '已经把宝贝加入购物车了',
                    'data' => ''
                ]);
            } else {
                return json([
                    'code' => 1,
                    'msg' => '加入购物车失败，再试试呗',
                    'data' => ''
                ]);
            }
        }
    }

    public function buy()
    {
        $edition_id = input('post.editionid');
        $color_id = input('post.colorid');
        $row = $this->ShopcatModel->buy($edition_id, $color_id);
        if ($row == 1) {
            return json([
                'code' => 1,
                'msg' => '购买成功',
                'data' => ""
            ]);
        } else if ($row == 2) {
            return json([
                'code' => 2,
                'msg' => '库存不够',
                'data' => ""
            ]);
        } else {
            return json([
                'code' => 3,
                'msg' => '购买失败',
                'data' => ""
            ]);
        }
    }

    public function tellogin()
    {
        return $this->fetch("./tellogin");
    }

    public function shopCat()
    {
        return $this->fetch("./gouwuche");
    }

    public function liebiao()
    {
        $obj = new ShopcatModel();
        
        if(!empty($id)){
            $id = input('id');
            $where = [
                'type_id' => $id
            ];
    
            $res = $obj->selectTotal_type($where);
            $this->assign('zhi',$res);
        }else{
             $name = input('name');
             $where = [
                 ['name','like',"%$name%"]
             ];
            
             $res = $obj->selectTotal_type($where);
             $this->assign('zhi',$res);
             $this->assign('name',$name);
        }
        return $this->fetch("./liebiao");
    }

    public function xiangqing()
    {
        return $this->fetch("./xiangqing");
    }
}

