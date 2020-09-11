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
//    public function test(){
//            date_default_timezone_set("PRC");
//            $qq = "851529665";
//            $result = file_get_contents("https://api.66mz8.com/api/qq.info.php?qq=".$qq);
//            $arr = json_decode($result,true);
//            if ($arr['code']== 200) {
//                dump($arr) ;
//            } else {
//                echo $arr['msg'];
//            }
//    }
    public function text(){
        static $NewArr = [];
//       $array = ["刘洋","肖金杨","邓光辉","杨周涛","何俊杰","雷坚","欧杨阳","李鹏建"];
//       $array2 = ["蔡富丽","何禹乐","谭文妆","曾一坚","夏文辉","杨成武","朱阳升","彭俊"];
//       $array3 = ["赵阳","尹国文","张顺","胡钟天","曹鑫","雷而雨","刘勇","彭呈彪"];
//       $array = ["冯志权","何文鑫","胡舒畅","李涛"];
        $ClassArr = ["刘洋","肖金杨","邓光辉","杨周涛","何俊杰","雷坚","欧杨阳","李鹏建",
            "蔡富丽","何禹乐","谭文妆","曾一坚","夏文辉","杨成武","朱阳升","彭俊",
            "赵阳","尹国文","张顺","胡钟天","曹鑫","雷而雨","刘勇",
            "彭呈彪","冯志权","何文鑫","胡舒畅","李涛"];

       for ($i=0;$i<=27;$i++){
           $rand = rand(1,27);
       }


//        $Code = ['111111',5];
//       return  messageSms(18774265532,$Code);
    }
}

