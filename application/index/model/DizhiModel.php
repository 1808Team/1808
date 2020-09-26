<?php
namespace  app\index\model;

use think\Db;


    class DizhiModel
    {

        protected  $table = 'tp_dizhi';



        //查询地址
        public function selectall(){

            return Db::name('dizhi')->select();

        }

        //添加地址
        public function address($data)
        {
            return Db::name('dizhi')->insert($data);

        }

        //查询要修改的地址
        public function chaxundizhi($id)
        {
            return Db::name('dizhi')->find($id);


        }

        //修改地址
        public function dihzixiugai($id,$data)
        {
            return Db::name('dizhi')->where('id',$id)->update($data);
        }

        //删除地址
        public function scdizhi($data){

            return Db::name('dizhi')->delete($data);

        }
    }

?>