<?php /*a:1:{s:64:"D:\phpstudy_pro\WWW\tp5.1\application/crud/view\index\index.html";i:1590750197;}*/ ?>
<html>
    <head>
        <title>增删查改</title>
    </head>
    <body>
    <a href="Index/insertHtml"><input type="button" value="增加" id="c"></a>
        <input type="button" value="删除" id="del">
        <input type="text" id="search"><input type="button" value="搜索" id="like">
        <table border="1" cellpadding="10" width="340" height="70" cellspacing="0" style="text-align: center">
            <tr>
                <td><input type="button"value="全选"></td>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>sex</td>
                <td>修改</td>
            </tr>
            <?php if(is_array($selectArr) || $selectArr instanceof \think\Collection || $selectArr instanceof \think\Paginator): if( count($selectArr)==0 ) : echo "" ;else: foreach($selectArr as $key=>$v): ?>
            <tr>
                <td><input type="checkbox" value="<?php echo htmlentities($v['id']); ?>"></td>
                <td><?php echo htmlentities($v['id']); ?></td>
                <td><?php echo htmlentities($v['name']); ?></td>
                <td><?php echo htmlentities($v['age']); ?></td>
                <?php if($v['sex'] == 1): ?>
                    <td>男</td>
                 <?php else: ?>
                       <td>女</td>
                <?php endif; ?>
                <td><button type="button" id="up" value="<?php echo htmlentities($v['id']); ?>">修改</button></td>
        <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
        </table>
    </body>
</html>
<script src="/static/jquery/jquery.min.js"></script>
<script>
    $("#up").click(function () {
        location.href="Index/amend/id/"+ $('#up').val();
    })

</script>