<?php
	session_start();
	
	//设置文件头-默认中文编码
	header('Content-Type:application/json; charset=utf-8');
	header("Access-Control-Allow-Origin: *");   //用于解决跨域问题
	
	$email = $_POST['email'];
	$code = $_POST['code'];
	
	// 取出code检验
	if($code == $_SESSION['code'.$email]){
		$arr = array('code'=>1,'msg'=>'登陆成功');
		//返回json数据
		echo json_encode($arr);
	}else{
		$arr = array('code'=>0,'msg'=>'验证码不正确','data'=>['a'=>$code,'b'=>$_SESSION['code'.$email]]);
		//返回json数据
		echo json_encode($arr);
	}
	
	
?>