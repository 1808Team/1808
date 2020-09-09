<?php /*a:1:{s:67:"D:\phpstudy_pro\WWW\tp5.1\application/admin/view\datatest\text.html";i:1589598529;}*/ ?>
<html>
<head>
</head>
<body>
    <table border="1" cellspacing="0" width="200" height="300">
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
        <tr>
            <td><?php echo htmlentities($vo['id']); ?></td>
            <td><?php echo htmlentities($vo['name']); ?></td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</body>
</html>