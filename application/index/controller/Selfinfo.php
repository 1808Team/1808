<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\SelfinfoModel;
use think\facade\Session;
class Selfinfo extends Controller
{

    public function Selfinfo()
    {
		
        $id=Session::get('id');
		$obj=new SelfinfoModel();
		$res=$obj->selects($id);

		$this->assign('res',$res);
		return $this->fetch("./self_info");
	}

}

