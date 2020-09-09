<?php /*a:1:{s:64:"D:\phpstudy_pro\WWW\tp5.1\application/baidu/view\.\logintow.html";i:1590817969;}*/ ?>
<html>
<head>
    <link rel="stylesheet" href="/loginStyle/css/style.css">
</head>
<body>
    <div class="content">
        <div class="form sign-in">
            <h2>欢迎回来</h2>
            <form action="/baidu/Index/login" method="post">
            <label>
                <span>账号</span>
                <input type="text"  name="LoginRoot"/>
            </label>
            <label>
                <span>密码</span>
                <input type="password" name="LoginPass"/>
                <input type="hidden" id="p" value="<?php echo htmlentities($name); ?>" name="hidden">
            </label>
            <!--            <p class="forgot-pass"><a href="javascript:">忘记密码？</a></p>-->
            <button type="submit" class="submit" id="login">登 录</button>
            </form>
            <!--           <button type="button" class="fb-btn">使用 <span>facebook</span> 帐号登录</button>-->
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>高级百度</h2>
                    <p>快速登入！</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>