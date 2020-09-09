<?php /*a:1:{s:61:"D:\phpstudy_pro\WWW\tp5.1\application/baidu/view\.\login.html";i:1591061779;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
<meta charset="utf-8">
<title>HTML注册登录页面模板</title>
<link rel="stylesheet" href="/loginStyle/css/style.css">
</head>

<body>
    <div class="content">
        <div class="form sign-in">
            <h2>欢迎回来</h2>
            <label>
                <span>账号</span>
                <input type="text"  name="LoginRoot"/>
            </label>
            <label>
                <span>密码</span>
                <input type="password" name="LoginPass"/>
            </label>
<!--            <p class="forgot-pass"><a href="javascript:">忘记密码？</a></p>-->
            <button type="button" class="submit" id="login">登 录</button>
<!--           <button type="button" class="fb-btn">使用 <span>facebook</span> 帐号登录</button>-->
        </div>

    <script src="/static/jquery/jquery-3.3.1.js"></script>
    <script src="/loginStyle/js/script.js"></script>
    <script>
        //登录控制器交互
        $("#login").click(function () {
            $.ajax({
                type:"post",
                url:"/baidu/Index/login",
                dataType:"json",
                data:{
                    hidden:$("input[name=pop]").val(),
                    LoginRoot:$("input[name=LoginRoot]").val(),
                    LoginPass:$("input[name=LoginPass]").val()
                },
                success:function(data){
                   if(data.code == 1){
                       alert(data.msg);
                       window.location = "/baidu/Index/index";
                   }else if(data.code == 3){
                       window.location = "/baidu/Index/Judgelogin/name="+data.id;
                   }
                }
            })
        })
    </script>
	<div style="text-align:center;">
</div>
</body>

</html>