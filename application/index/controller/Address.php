<?php

namespace app\index\controller;


use think\Controller;
use app\index\model\DizhiModel;
use think\facade\Session;

    class Address extends Controller
    {

        //渲染收获地址
        public function index()
        {
            //查询所有地址
            $dizhiModel = new DizhiModel();

            $dizhiRes = $dizhiModel->selectall();

            $this->assign('res',$dizhiRes);

            return $this->fetch('./shaddress');


        }

        //渲染添加地址
        public function dizhi()
        {

            $where = ['pid' => ['eq',1]];

            $res = db('sjld')->select();

            $this->assign('province',$res);

            return $this->fetch('./adddizhi');


        }


        //查询市区
        public function getRegion()
        {
            //获取市区县镇

            $map['pid'] = input('pid');
            $map['type'] = input('type');


            $res = db('sjld')->where($map)->select();

            return $res;



        }

        //添加地址逻辑
        public function adddizhi()
        {

            //判断是否是ajax接收
            if (request()->isAjax()) {
                //接收值ajax传过来的值
                $sheng = input("sheng");
                $city = input("city");
                $town = input("town");

                $dizhi = input("dizhi");
                $names = input("names");
                $phone = input("phone");
                $danxuanzhi = input("danxuanzhi");

                $zodizhi = $sheng . $city . $town;


                //判断
                //手机号码验证
                if (!preg_match("/^1[345789]{1}\d{9}$/", $phone)) {

                    return json(['code' => -4, 'msg' => '手机号码不合法', 'data' => '']);

                }


                //引入model
                $dizhiModel = new DizhiModel();

                //添加
                $data = [

                    "quyu" => $zodizhi,
                    "address" => $dizhi,
                    "name" => $names,
                    "phone" => $phone,
                    "tinyint" => $danxuanzhi

                ];


                //添加地址方法
                $dizhiRes = $dizhiModel->address($data);

                //成功
                if ($dizhiRes == 1) {

                    return json(['code' => 1, 'msg' => '添加地址成功', 'data' =>'/index/Address/index']);

                } else {

                    return json(['code' => 2, 'msg' => '添加地址失败', 'data' => '']);
                }
            }
        }


        //渲染修改地址
        public  function updatedizhi()
        {
            //引入model
            $dizhiModel = new DizhiModel();

            $id =  input('id');

            $where = ['pid' => ['eq',1]];


            $res = db('sjld')->select();
            $ress = $dizhiModel->chaxundizhi($id);

            $this->assign('province',$res);

            $this->assign('firo',$ress);

            return $this->fetch('./updatedizhi');



        }
        //修改地址
        public function xiugaidizhi(){
            //判断是否是ajax接收
            if (request()->isAjax()) {
                //接收值ajax传过来的值
                $sheng = input("sheng");
                $city = input("city");
                $town = input("town");
                $dizhi = input("dizhi");
                $names = input("names");
                $phone = input("phone");
                $danxuanzhi = input("danxuanzhi");

                $zodizhi = $sheng . $city . $town;

                //判断
                //手机号码验证
                if (!preg_match("/^1[345789]{1}\d{9}$/", $phone)) {

                    return json(['code' => -4, 'msg' => '手机号码不合法', 'data' => '']);

                }

                $id =  input('id');


                //引入model
                $dizhiModel = new DizhiModel();


                $data = [

                    "quyu" => $zodizhi,
                    "address" => $dizhi,
                    "name" => $names,
                    "phone" => $phone,
                    "tinyint" => $danxuanzhi

                ];


                $res = $dizhiModel->dihzixiugai($id,$data);



                //成功
                if ($res == 1) {

                    return json(['code' => 1, 'msg' => '修改地址成功', 'data' =>'/index/Address/index']);

                } else {

                    return json(['code' => 2, 'msg' => '修改地址失败', 'data' => '']);
                }



            }

        }
        //删除地址
        public function delizhi()
        {

            if(request()->isAjax()){

                //接收值
                $id = input('id');

                //引入model
                $dizhiModel = new DizhiModel();


                $res =  $dizhiModel->scdizhi($id);

                return json([
                    'code' => 1,
                    'msg' => '删除地址成功',
                    'data' => ''

                ]);

            }

        }




    }