<?php 
    namespace app\index\controller;
    
    use think\Controller;
    use think\captcha\Captcha;
    use app\index\model\Sql;
    
    class Login extends Controller{
        public function index(){
            return $this->fetch('./login');
        }
        
        public function login(){
            if(request()->isAjax()){
            $user = input('user');
            $pass = input('pass');
            $yanzhengma = input('yanzhengma');
            
            //验证码验证
            $captcha = new Captcha();
            if( !$captcha->check($yanzhengma))
            {
                return "验证码错误";
            }else{
                //登录条件
                $where = [
                    'name' => $user,
                    'pass' => $pass
                ];
                
                $sql = new Sql();
                $res = $sql->sel($where);
                
                if($res){
                    return 登录成功;
                }else{
                    return "登录失败";
                }
            }
            
        }
        }
    }
?>