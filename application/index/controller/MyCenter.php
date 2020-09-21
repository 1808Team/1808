<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\SelfinfoModel;
use think\facade\Session;
class MyCenter extends Controller
{
	//渲染，分配变量
	public function index()
	{
		//接收变量
		$id = input('id');
		$data = input('data');
		$ziduan = input('zduan');
	
		//分配变量
		$this->assign('id',$id);
		$this->assign('data',$data);
		$this->assign('ziduan',$ziduan);
		return $this->fetch("./mycenter");
	}
	
	//修改内容
	public function mycentera()
	{
		//接收变量
		$id = input("id");
		$ziduan = input("ziduan");
		$content = input('content');
		
		//实例化model
		$selfinfo = new SelfinfoModel();
		
		//数组存值，方便model使用
		$where = [
			'id'=>$id,
		];
		$data = [
			$ziduan =>$content
		];
		//调用方法
		$res = $selfinfo->updates($where,$data );
		if($res != 0){
		 return json([
                'code' => 1,
                'msg' => '修改成功',
                'data' => ""
            ]);
		}else{
			 return json([
                'code' => - 1,
                'msg' => '修改失败',
                'data' => ""
            ]);
		}
	}
}
?>