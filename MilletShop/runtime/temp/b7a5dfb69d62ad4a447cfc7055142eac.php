<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\tp5.1\application/admin/view\initialize\loginsucceed.html";i:1590022775;}*/ ?>
<html>
    <head>
    </head>
    <body>
    <form action="" method="post">
        账号:<input type="text" name="root"id="root">
        <br/>
        密码:<input type="text"name="pass" id="pass">
        <br/>
        <button type="submit" id="login" value="登录">登录</button>
    </form>
    </body>
    <script src="/static/jquery/jquery.min.js"></script>
    <script>
            $("button").click(function () {
                var root = $("#root").val();
                var pass = $("#pass").val();
                $.ajax({
                    type:"post",
                     url:"<?php echo url("","",true,false);?>",
                   // url:"./test.php",
                    dataType:"json",
                    data:{
                        root:root,
                        pass:pass
                    },
                    success:function (data) {

                    }
                });
            })
    </script>
</html>