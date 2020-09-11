<?php
    namespace app\index\controller;

    use think\Controller;
    use app\index\model\shopcat;
    use think\facade\Session;
    class Catshop extends Controller/**/
    {
       private $shopcatModel;
        public function index(){
            $arr = $this->ShopCatData();
            if( $arr ){
               $this->assign('ShopCatData',$arr);
            }else{
                return $this->fetch('./login');
                //没有数据跳转403页面
            }
            return $this->fetch('./gouwuche');
        }
        public function ShopCatData(){
            $id = Session::get('id');
            if(empty($id)){
                GotoLogin();
                return false;
            }
            $this->shopcatModel = new shopcat();
            $where = [
              "pid" => $id,
            ];
             $result = $this->shopcatModel->ShowData($where);
             if( $result ){
                 return $result;
             }
             return false;
        }
    }


?>