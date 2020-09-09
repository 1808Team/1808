<?php
    namespace app\index\Controller;

    use app\index\model\admin;
    use think\facade\Session;

    class Login
    {
        protected  $arr = ["code"=>"","msg"=>"","data"=>''];
        protected $Admin;
        public function __construct()
        {
            $this->Admin = new Admin();
            $this->arr['code'] = 0;
            $this->arr['msg'] = lang('DataError');// 配置常量 可用常量代替
        }
        public function index(){
            if(request()->isAjax()){
                $root  = input('root');
                $pass = input('pass');
                $code = input('captcha');
                if(empty($root)||empty($pass)||empty($code)){
                    $this->arr['code'] = 0;
                    $this->arr['msg'] = lang('DataError');// 配置常量 可用常量代替
                    return $this->arr;
                }
                if (!captcha_check($code)){
                    $this->arr['code'] = 0;
                    $this->arr['msg'] = "验证码错误";// 配置常量 可用常量代替
                    return $this->arr;
                }
                /**
                 * 匹配账号密码 正确性 将账户和密码 输入即可
                 */
                $data = ["root" => $root,"password"=>$pass];
                $result  = $this->Admin->JudgeRoot($data);
                if( $result ){
                    $this->arr['code'] = 1;
                    $this->arr['msg'] = lang('Login');//lang
                    $this->arr['data'] = "Index/Home/index";
                    Session::set('root',$root);
                    Session::set('id',$result['id']);
                    return   $this->arr;
                }
                $this->arr['code'] = 0;
                $this->arr['msg'] = lang('DataError');// 配置常量 可用常量代替
                return $this->arr;
            }
        }
    }

?>