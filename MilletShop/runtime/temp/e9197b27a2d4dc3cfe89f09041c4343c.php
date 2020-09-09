<?php /*a:1:{s:69:"D:\phpstudy_pro\WWW\tp5.1\application/crud/view\index\insertdata.html";i:1590753864;}*/ ?>
<html>
    <head>
        <title>增加数据</title>
    </head>
    <body>
    <h1>请输入你要添加的数据</h1>
    <hr/>
    <form action="" method="post">
        name:<input type="text" name="name">
        <br/>
        age:<input type="text" name="age">
        <br/>
        sex:<input type="radio" name="sex" value="1">男 <input type="radio" name="sex"value="2">女
        </br>
        <button type="button" id="insertdata">增加</button>
        </form>
    </body>
</html>
<script type="text/javascript" src="/static/jquery/jquery-3.3.1.js"></script>
<script>
    $("#insertdata").click(function () {
        $.ajax({
            type:"post",
            url:"<?php echo url('crud/Index/insertArr'); ?>" ,
            dataType:"json",
            data:{
                name:$("input[name=name]").val(),
                age:$("input[name=age]").val(),
                sex:$("input[name=sex]").val()
            },
            success:function(data)
            {
                if(data == 404){
                    alert("请填写完整")
                }else if(data == 505){
                    alert("当前数据新增过多，请稍后再试")
                }else if(data == 101) {
                    alert("新增成功")
                    location.href = "Index/index"
                }
            }
        })


    })

</script>