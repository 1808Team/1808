<?php
namespace app\index\controller;

use think\Controller;
class Index extends Controller
{

    public function index()
    {
        return $this->fetch("./index");
    }
    public function login(){
        return $this->fetch("./login");
    }
    public function register(){
        return $this->fetch("./register");
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
    public function test(){
            date_default_timezone_set("PRC");
            $qq = "851529665";
            $result = file_get_contents("https://api.66mz8.com/api/qq.info.php?qq=".$qq);
            $arr = json_decode($result,true);
            if ($arr['code']== 200) {
                dump($arr) ;
            } else {
                echo $arr['msg'];
            }
    }
}

