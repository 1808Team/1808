<?php 
    namespace app\index\controller;
    
    use think\Controller;
    use think\Session;
    use app\index\Model\GoodsModel;
    
    class Goods extends Controller{
        /*
         * 渲染购物车
         */
        public function index(){
            $this->assign('count',count($this->shopData()));
            $this->assign('data',$this->shopData());
            return $this->fetch('goods/shop');           
        }
        
        /*
         * 购物车数据
         */
        public function shopData(){
            $goodsData = new GoodsModel();
            
            $name = Session('root');  //当前用户
            $counten = $goodsData->shopping($name);
          
            return  $counten;
        }
        /*
         *删除一条 
         */
        public function delets(){
           $id = input('id');   
           $goodsData = new GoodsModel();
           $where = [
               'id'=>$id
           ];
           $res = $goodsData->deletes($where);
           if($res != 0){
               return json(['code'=>1,'msg'=>"删除成功",'data'=>""]);
           }else{
               return json(['code'=>-1,'msg'=>"删除失败",'data'=>""]);
           }
           
           
        }
    }
?>