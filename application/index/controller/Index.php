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
        if (is_null($this->ShopcatModel)) $this->ShopcatModel = new ShopcatModel();
    }

    public function index()
    {
		$rows = $this->ShopcatModel->ShowData(null);
		$this->assign("root",session('root'));
		$this->assign("rows",$rows);
        return $this->fetch("./index");
    }
	//渲染详情页
	public function details(){
		$id = input('id');
		if(empty($id)){
			$this->error("数据错误","/index/index/index");
		}
        $where = ['id'=>$id];
        $goodsFind = $this->ShopcatModel->queryGoodsFind($where);
		
        $where2 = ["goods_id"=>$id];
        $editionData = $this->ShopcatModel->queryEditionData($where2);
        $count = 0;
        foreach ($editionData as $k => &$v) {
            $v['count'] = $count;
            $count ++;
        }
        unset($count);
		$this->assign("goodsFind",$goodsFind);
		$this->assign("editionData",$editionData);
		return $this->fetch("./xiangqing");
	}
	// 查询商品的颜色
    public function color()
    {
        if(request()->isAjax()) {
            $id = input('id');
            if (empty($id)) {
                return json([
                    'code' => 1,
                    'msg' => '数据错误',
                    'data' => ''
                ]);
            }
            $where = [
                'pid'=>$id
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
			$where=[
				'configure_id'=>$editionid,
				'color_id'=>$colorid,
				'pid'=>$id,
				'buyer'=>session('root')
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

	public function buy(){
       $edition_id = input('post.editionid');
       $color_id = input('post.colorid');
       $row = $this->ShopcatModel->buy($edition_id,$color_id);
       if($row == 1){
           return json([
               'code'   =>1,
               'msg'    =>'购买成功',
               'data'   => ""
           ]);
       }else if($row == 2){
           return json([
               'code'   =>2,
               'msg'    =>'库存不够',
               'data'   => ""
           ]);
       }else{
           return json([
               'code'   =>3,
               'msg'    =>'购买失败',
               'data'   => ""
           ]);
       }
    }


	public function tellogin(){
		return $this->fetch("./tellogin");
	}
    public function shopCat(){
        return $this->fetch("./gouwuche");
    }
    public function liebiao(){
        return $this->fetch("./liebiao");
    }
    public function xianqing(){
        return $this->fetch("./xiangqing");
    }
	
	

}

