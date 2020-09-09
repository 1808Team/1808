<?php /*a:1:{s:60:"D:\phpstudy_pro\WWW\tp5.1\application/baidu/view\.\show.html";i:1591062473;}*/ ?>
<html>
<head>
    <title>查找结果</title>
    </head>
<body>
<h1>查找结果</h1>
    <div>
        <?php if(is_array($showArr) || $showArr instanceof \think\Collection || $showArr instanceof \think\Paginator): if( count($showArr)==0 ) : echo "" ;else: foreach($showArr as $key=>$v): ?>
        <a href="/baidu/Index/Judgelogin/name=<?php echo htmlentities($v['title']); ?>"><?php echo htmlentities($v['title']); ?></a>
        <br/>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>
</html>