<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>登录</title>
<script src="/Public/Js/jquery.js"></script>
<script src="/Public/login/jquery.placeholder.js"></script>
<link rel="stylesheet" href="/Public/Css/pintuer.css">
<link rel="stylesheet" href="/Public/login/admin.css">
<link rel="stylesheet" href="/Public/login/login.css">
<script src="/Public/Js/respond.js"></script>
<script src="/Public/Js/layer/layer.min.js"></script>

</head>
<body>
<div class="topDiv"></div>
<div class="loginBox">
	<div class="clearfix">
        <div class="userN">
        	<input type="text" name="username" placeholder="用户名">
        	<span class="icon icon-user"></span>
        </div>
        <div class="passW">
        	<input type="password" name="password" placeholder="密码" />
        	<span class="icon icon-key"></span>
        </div>
        <div class="btnF"><input type="button" id="thesubmit" value="登 录" /></div>
       <!--  <div class="forget"><a href="#">忘记密码?</a></div> -->
    </div>
    <div class="textR">ROBOTNOR</div>
</div>
</body>
<script>
 $('.topDiv').height($(window).height()*0.37);
 $('.userN input').placeholder();
 $('.passW input').placeholder();

 /*跳转*/
 function derect(url,time){
 	setTimeout(function(){
 		location.href = url;	
 	},time);
 }
 function mes(info,obj,color){
 	layer.tips(info, obj, {
 		    style: ['background-color:#'+color+'; color:#fff', '#'+color],
 		    maxWidth:185,
 		    time: 1,
 		    closeBtn:[0, false],

 		});
 }
 
 $(function(){
	 $('#thesubmit').bind('click',function(){
		 
		 var obj      = this
		 var username = $('.userN').find("input[name='username']").val();
		 var password = $('.passW').find("input[name='password']").val();
		 var url  = "/admin.php/Login/login_post";
		 var data = "username="+username+"&password="+password;
		 
		 $.post(url,data,function(data){

			 if(parseInt(data)==1){
				 mes("恭喜你，登陆成功",obj,'78BA32');
				 derect("/admin.php/Index/index",1000);
			 }else{
				 mes("很抱歉,您的账户或者密码不存在",obj,'C10005');
			 }
		 })
	 })
 })

</script>
</html>