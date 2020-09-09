<?php /*a:1:{s:65:"D:\phpstudy_pro\WWW\tp5.1\application/crud/view\index\update.html";i:1590044232;}*/ ?>
<html>
    <head>
        <title>增加数据</title>
    </head>
    <body>

    <form action="" method="post">
        <?php if(is_array($UpArr) || $UpArr instanceof \think\Collection || $UpArr instanceof \think\Paginator): if( count($UpArr)==0 ) : echo "" ;else: foreach($UpArr as $key=>$vo): ?>
        name:<input type="text" name="name" value="<?php echo htmlentities($vo['name']); ?>">
        <br/>
        age:<input type="text" name="age" value="<?php echo htmlentities($vo['age']); ?>">
        <br/>
        <?php if($vo['sex'] == 1): ?>
            sex:<input type="radio" name="sex" value="1" checked>男 <input type="radio" name="sex"value="2">女
            <?php elseif($vo['sex'] == 2): ?>
            sex:<input type="radio" name="sex" value="1" >男 <input type="radio" name="sex"value="2" checked>女
            {/elseif}
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <button type="button" value="" id="up">修改</button>
    </form>
</body>
</html>
<script src="/static/jquery/jquery.min.js"></script>
<script>
    $("#up").click(function () {
        $.ajax({
            type:"post",
            url:"<?php echo url("","",true,false);?>",
            dataType:"json",
            data: {
                name: $("input[name=name]").val(),
                age: $("input[name=age]").val(),
                sex: $("input[name=sex]").val()
            },
            success:function (data) {
                console.log(data);
            }
        })
    })
</script>