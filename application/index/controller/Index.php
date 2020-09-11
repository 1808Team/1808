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

}

