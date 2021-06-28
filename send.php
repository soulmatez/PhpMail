<?php
	session_start();
	$email = $_POST['email'];
	$code = '';
	for($i=0;$i<6;$i++){
		$code = $code.rand(0,9);
	}
	// 将code存入session
	$_SESSION['code'.$email] = $code;
	
	require '163SendMail.php';
	sendMail($email,'云际大矿场','【云际矿业】您本次验证码是：'.$code.',切勿将验证码泄露给他人');
	//设置文件头-默认中文编码
	header('Content-Type:application/json; charset=utf-8');
	header("Access-Control-Allow-Origin: *");   //用于解决跨域问题
	
?>