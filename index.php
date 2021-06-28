<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/index.css"/>
</head>
<body>
<div id="login">
    <h1>Login</h1>
    <div>
        <input type="text" required="required" placeholder="请输入您的邮箱" id="email" name="email"></input>
        <input type="password" required="required" placeholder="请输入您的验证码" id="code" name="code"></input>
        <input class="span" type="button" value="获取验证码" onclick="settime(this)" />
        <button class="but" type="submit" id="send">登录</button>
    </div>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<script>
	$(function(){
		$("#send").click(function(){
			$.ajax({
			    type: "POST",
			    url: "postForm.php",
			    data: {email:$("#email").val(), code:$("#code").val()},
			    success: function(data){
					console.log(data)
					layer.msg(data.msg);
			    }
			});
		})
	})
</script>
<script>
	var timer;
	var countdown=60;
	function settime(val) {
		var timer = setTimeout(function() {
			settime(val) 
		},1000) 
		
		if (countdown == 0) { 
			clearTimeout(timer);
			val.removeAttribute("disabled"); 
			val.value="获取验证码"; 
			countdown = 60; 
		}else{ 
			val.setAttribute("disabled", true); 
			val.value="重新发送(" + countdown + ")"; 
			countdown--; 
			if(countdown == 58){
				var str = '';
				for(var i=0;i<6;i++){
					str = str + Math.floor(Math.random()*10)
				}
				$("#yzm").val(str);
				$.ajax({
				    type: "POST",
				    url: "send.php",
				    data: {email:$("#email").val(), code:str},
				    success: function(data){
						console.log(data)
						layer.msg(data.msg);
				    }
				});
			}
		} 
		
	} 
</script>
</html>