<?php
    namespace app\index\Controller;

    use app\index\model\AdminModel;
    use think\facade\Session;
	/**
     *  登录类
	 */
    class Login
    {
        protected  $arr = ["code"=>"","msg"=>"","data"=>''];
        protected $Admin;
        public function __construct()
        {
            $this->Admin = new AdminModel();
            $this->arr['code'] = 0;
            $this->arr['msg'] = lang('DataError');
        }
        public function index(){
            if(request()->isAjax()){
                $root  = input('root');
                $pass = input('pass');
                $code = input('captcha');
                if(empty($root)||empty($pass)||empty($code)){
                    $this->arr['code'] = 1;
                    $this->arr['msg'] = lang('DataError');
                    return $this->arr;
                }
                if (!captcha_check($code)){
                    $this->arr['code'] = 1;
                    $this->arr['msg'] = "验证码错误";
                    return $this->arr;
                }
                /**
                 * 匹配账号密码 正确性 将账户和密码 输入即可
                 */
                $data = ["account" => $root];
                $result  = $this->Admin->JudgeRoot($data);
                if(is_null($result)){
                    $this->arr['code'] = 1;
                    $this->arr['msg'] = lang('JudgeError');//lang
                    return $this->arr;
                }
                if($result['password'] != md5($pass)){
                    $this->arr['code'] = 1;
                    $this->arr['msg'] = lang('JudgeError');//lang
                    return $this->arr;
                }
                $this->arr['code'] = 0;
                $this->arr['msg'] = lang('Login');//lang
                $this->arr['data'] = "/Index/index/index";
                Session::set('root',$root);
                Session::set('id',$result['id']);
                return  $this->arr;
            }
            return view("user/login");
        }
		public function duanx(){
		$jies = new \Redis();
		$jies->connect('127.0.0.1');
		$cans = input("tel");
		$captcha = "";
		for($i=0;$i<=4;$i++){
                $rand = rand(0,10);
               $captcha .= $rand;
            }
            /**
             * 验证码 存入 redis 5 分钟后删除 未删除再次存入 替换
             */
         $jies->set($cans,$captcha,300);
		//sendTemplateSMS("手机号码","内容数据","模板Id");
		
		return messageSms($cans,array($captcha,5));
    }

	public function duanxin(){
		if(request()->isAjax()){
			$tel = input('tel');
			$cod = input('yan');
			if(empty($tel)||empty($cod)){
				$this->arr['code'] = 0;
                    $this->arr['msg'] = '请填充完整';
                    return json($this->arr);
			}
			$jies = new \Redis();
			$jies->connect('127.0.0.1');
			$zhi = $jies->get($tel);
			if($zhi == $cod){
				return json(['code'=>0,'msg'=>"验证码正确",'data'=>"/index/index/index"]);
			}else{
				return json(['code'=>0,'msg'=>"验证码错误",'data'=>""]);
			}
		}
	}
	}

?>