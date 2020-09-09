<?php /*a:1:{s:61:"D:\phpstudy_pro\WWW\tp5.1\application/baidu/view\.\index.html";i:1590807398;}*/ ?>
<html>
    <head>
        <title>搜索</title>
    </head>
    <body>
    <a href="/baidu/Index/Gologin">
        <?php echo htmlentities($res); ?>
    </a>
    </br>
    <form action="/baidu/Index/search" method="get">
        <input type="text" name="search" >
        <input type="submit" value="搜索" id="submit">
    </form>

    <script src="/static/jquery/jquery-3.3.1.js"></script>
    <script>
        // $("submit").click(function () {
        //
        // })
    </script>
    </body>
</html>