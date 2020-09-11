<?php
    namespace  app\index\controller;

    use think\Controller;
    use app\index\Model\admin;
    use module\Redis;

    class Register extends Controller
    {
        protected  $arr = ["code"=> 0 ,"msg"=>"",'data'=>''];
        private $captcha = "";
        private $AdminModel;
        public function __construct()
        {
            $this->AdminModel = new admin();
        }
        public function index(){

        }

        /**
         * 生成 随机验证码返回个Ajax
         * @return string
         */
        public function captcha(){

            for($i=0;$i<=4;$i++){
                $rand = rand(0,10);
                $this->captcha .= $rand;
            }
            /**
             * 验证码 存入 redis 5 分钟后删除 未删除再次存入 替换
             */
            redis()->set('captcha',$this->captcha,300);
           return  $this->captcha;
        }

        /**
         * 判断账号信息 正确性
         * @return array
         */
        public function Judgeregister(){
            if(request()->isAjax()){
                $root  = input('root');
                $pass  = input('pass');
                $phone = input('phone');
                $captcha = input('captcha');
                $arr = [$root,$pass,$phone,$captcha];
                if(isNulls($arr)){
                    $this->arr['msg']  = lang('DataNull');
                    return $this->arr;
                }else if(JudgePhone($phone)){
                    $this->arr['msg']  = lang('PhoneError');
                    return $this->arr;
                } else if($captcha !==  redis()->get('captcha') ){
                    $this->arr['msg']  = lang('CaptchaError');
                    return $this->arr;
                }
                $AdminData = ['root'=>$root,'password'=>$pass,'phone'=>$phone];
                $Result = $this->register($AdminData);
                if( $Result ){
                    $this->arr['code']  = 1 ;
                    $this->arr['msg']  = lang('Register');
                    return $this->arr;
                }
                $this->arr['msg']  = lang('DataError');
                return $this->arr;
        }
        }
        /**
         * 判断账号是否重复  否:用户信息存入数据库
         * @param $AdminData
         */
        public function register($AdminData){
            $Result =  $this->AdminModel->JudgeAdmin($AdminData['root']);
            if(empty($Result)){
              return  $Result = $this->AdminModel->Register($AdminData);
            }
            return false;
        }
    }

?>