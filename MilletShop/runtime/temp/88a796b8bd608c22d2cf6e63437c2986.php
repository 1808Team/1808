<?php /*a:1:{s:63:"D:\xiaomiShop\MilletShop\application/index/view\.\register.html";i:1599210324;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/static/css/login.css">
		<style>
			.captcha{border:1px solid rgb(255,103,0);width:100px;height: 40px;line-height: 20px;font-size: 17px;
			color: #FFFFFF;background-color: rgb(255,103,0)}
			.openFont{font-size: 14px;font-weight:bold;margin:10px 10px}
			.captchaFont{font-size: 26px;font-weight:bold;margin:40px 10px}
			.note{font-size:12px;color: #5c5c5c;}
			.content{font-size: 14px}
		</style>
		<script src="/static/jquery/jquery.min.js"></script>a
		<script src="/static/layer/layer.js"></script>
	</head>
	<body>
		<form  method="post">
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="./index.html" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" placeholder="请输入你的用户名"/><span>请不要输入汉字</span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/><span>请输入6位以上字符</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="phone" placeholder="请确认你的密码"/><span>两次密码要输入一致哦</span></div>
					<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="tel" placeholder="请填写正确的手机号"/><span>填写下手机号吧，方便我们联系您！</span></div>
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="captcha" placeholder="请输入验证码"/></div>
						<div class="right fl"><button type="button" class="captcha" name="button">获取验证码</button>
						<div class="clear"></div>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="button" name="submit" value="立即注册" >
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>
<script>
	var time = 60
	var Int;
	$("button[name=button]").click(function () {
		layer.msg('验证码已发送');
		$("button[name=button]").attr("disabled", "true");
		Int = setInterval(Countdown,1000)
		$.ajax({
			type:"post",
			url:"/Index/Register/captcha",
			dataType:"json",
			success:function (captcha) {
				layer.open({
					type:1,
					skin:'layui-layer-rim',
					area:['420px','240px'],
					content:'<div class="open">'+
							'<p class="openFont">验证码<p>' +
							'<span class="captchaFont">'+captcha +'</span>'+ '<div>' +'<hr>'+
							'<p class="note">短信内容</p>'+
							'<p class="content">【小米商城】注册小米商城账号验证码，5分钟内有效。</p>' +
							'</div>'+ '</div>'
				})
			},
		})
	})
	function Countdown(){
		if(time === 1 ){
			clearTimeout(Int);
			time = 60;
			$("button[name=button]").text('获取验证码')
			$("button[name=button]").removeAttr("disabled");
			return;
		}else{
			time--;
			$("button[name=button]").text(time)
		}
	}
	$('.submit').click(function () {
		$.ajax({
			type:"post",
			url:"/Index/Register/Judgeregister",
			data:{
				root:$("input[name=username]").val(),
				pass:$("input[name=password]").val(),
				captcha:$("input[name=captcha]").val(),
				phone:$("input[name=phone]").val()
			},
			dataType:"json",
			success:function (data) {
					if(data['code'] == 1){
						layer.msg(data['msg'])
						location.href = 'Index/Home/index'
					}else{
						layer.msg(data['msg'])
					}
			},
			error:function () {

			}

		})
	})

</script>