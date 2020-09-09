<?php /*a:1:{s:65:"D:\phpstudy_pro\WWW\tp5.1\application/login/view\index\index.html";i:1590668969;}*/ ?>
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
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>还未注册？</h2>
                    <p>立即注册，发现大量机会！</p>
                </div>
                <div class="img__text m--in">
                    <h2>已有帐号？</h2>
                    <p>有帐号就登录吧，好久不见了！</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">注 册</span>
                    <span class="m--in">登 录</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>立即注册</h2>
                <label>
                    <span>用户名</span>
                    <input type="text" name="userName"/>
                </label>
                <label>
                    <span>账号</span>
                    <input type="text" name="RegisterRoot"/>
                </label>
                <label>
                    <span>密码</span>
                    <input type="password" name="RegisterPass" />
                </label>
                <button type="button" class="submit" id="register">注 册</button>
<!--                <button type="button" class="fb-btn">使用 <span>facebook</span> 帐号注册</button>-->
            </div>z
        </div>
    </div>
    <script src="/static/jquery/jquery-3.3.1.js"></script>
    <script src="/loginStyle/js/script.js"></script>
    <script>
        //注册 ajax 交互
        $("#register").click(function () {
            $.ajax({
                type:"post",
                url:"<?php echo url("","",true,false);?>",
                dataType:"json",
                data:{
                    id:1,
                    userName:$("input[name=userName]").val(),
                    RegisterRoot:$("input[name=RegisterRoot]").val(),
                    RegisterPass:$("input[name=RegisterPass]").val()
                },
                success:function(data){
                    alert(data)
                }
            })
        })
        //登录控制器交互
        $("#login").click(function () {
            $.ajax({
                type:"post",
                url:"<?php echo url("","",true,false);?>",
                dataType:"json",
                data:{
                    id:2,
                    LoginRoot:$("input[name=LoginRoot]").val(),
                    LoginPass:$("input[name=LoginPass]").val()
                },
                success:function(data){
                    alert(data)
                }
            })
        })
    </script>
	<div style="text-align:center;">
<!--<p>更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>-->
</div>
</body>

</html>