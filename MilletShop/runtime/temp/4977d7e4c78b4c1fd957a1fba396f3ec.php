<?php /*a:1:{s:65:"D:\phpstudy_pro\WWW\tp5.1\application/crud/view\index\Update.html";i:1589944133;}*/ ?>
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
        <if condition="$vo.sex eq 1">
            sex:<input type="radio" name="sex" value="1" checked>男 <input type="radio" name="sex"value="2">女
            <elseif condition="$vo.sex eq 2">
            sex:<input type="radio" name="sex" value="1" >男 <input type="radio" name="sex"value="2" checked>女
            </elseif>
        </if>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</body>
</html>