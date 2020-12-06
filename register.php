<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/1_base.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<title>博客 - 注册</title>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		var myfrom=document.getElementById("myform");//获取表单对象
		//为更好用户体验，再用户填写完资料立马提示
		var user=document.getElementById("user");
		var pwd=document.getElementById("pwd");
		var pwda=document.getElementById("pwda");
		var phone=document.getElementById("phone");
		var email=document.getElementById("email");
		var code=document.getElementById("code");
		/*var chked=document.getElementById("chked");*/
		user.onblur=ckuser;
		pwd.onblur=ckpwd;
		pwda.onblur=ckpwda;
		phone.onblur=ckphone;
		email.onblur=ckemail;
		code.onblur=ckcode;
		/*chked.onblur=ckchked;*/
		$("#submit").click(function(){
				return ckuser() && ckpwd() && ckpwda() && ckphone() && ckemail() && ckcode()
				/*&& ckchked()*/
			;//必须同时为真才能提交表单
		})
		function ckuser(){
			var user=$("#user").val();
			var reg=/^[a-zA-Z]\w{5,9}$/;
			if(user==""){
				$(this).next("div").children("i").html("用户名不能为空！").addClass("no").removeClass("ok");
				return false;
			}else if(reg.test(user)){
				   //$(this).next("div").children("i").html("通过！").addClass("ok").removeClass("no");
					$.ajax({
						type:"get",
						url:"ajax_chk.php",
						data:"user="+$("#user").val(),
						success: function(d){
							if(d=="ok"){
								$("#user").next("div").children("i").html("<font color='#00ff00'>该同户名可用！</font>");
								 return true;
							}else{
								$("#user").next("div").children("i").html("<font color='#ff0000'>该用户名已经存在！</font>");
								return false;
							}
						}
					})
				}else{
				   $(this).next("div").children("i").html("账户名必须是由字母开头并且包括数字和符号的6-10位字符！！").addClass("no").removeClass("ok");
				   return false;			   
			   }
			}
		function ckpwd(){
			var pwd=$("#pwd").val();
			if(pwd==""){
				$(this).next("div").children("i").html("密码不能为空！").addClass("no").removeClass("ok");
				return false;
			}
			var reg=/^\w{8,16}$/;
			if(reg.test(pwd)){
			   $(this).next("div").children("i").html("通过！").addClass("ok").removeClass("no");
			   return true;
		   }else{
			   $(this).next("div").children("i").addClass("no").removeClass("ok");
			   return false;			   
		   }
		}
		function ckpwda(){
			var pwda=$("#pwda").val();
			if(pwda==""){
				$(this).next("div").children("i").html("请再一次输入密码！").addClass("no").removeClass("ok");
				return false;
			}
			if(pwda==$("#pwd").val()){
			   $(this).next("div").children("i").html("通过！").addClass("ok").removeClass("no");
			   return true;
		   }else{
			   $(this).next("div").children("i").addClass("no").removeClass("ok");
			   return false;			   
		   }
		}
		function ckphone(){
			var phone=$("#phone").val();
			if(phone==""){
				$(this).next("div").children("i").html("请输入你的手机号码！").addClass("no").removeClass("ok");
				return false;
			}
			var reg=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			if(reg.test(phone)){
			  $(this).next("div").children("i").html("通过！").addClass("ok").removeClass("no");
			   return true;
		   }else{
			   $(this).next("div").children("i").html("找不到该手机号码！").addClass("no").removeClass("ok");
			   return false;			   
		   }
		}
		function ckemail(){
			var email=$("#email").val();
			if(email==""){
				$(this).next("div").children("i").html("请输入你的邮箱地址！").addClass("no").removeClass("ok");
				return false;
			}
			var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			if(reg.test(email)){
			  $(this).next("div").children("i").html("通过！").addClass("ok").removeClass("no");
			   return true;
		   }else{
			   $(this).next("div").children("i").html("找不到该邮箱号码地址！").addClass("no").removeClass("ok");
			   return false;	   
		   }
		}
		function ckcode(){
			var code=$("#code").val();
			if(code==""){
				$(this).siblings(".t_info").children("i").html("请输入你的验证码！").addClass("no").removeClass("ok");
				return false;
			}else{
				$.ajax({
					type:"get",
					url:"ajax_chk_code.php",
					data:"code="+$("#code").val(),
					success: function(d){
						if(d=="ok"){
							$("#code").siblings(".t_info").children("i").html("<font color='#00ff00'>验证码通过！</font>");
							 return true;
						}else{
							$("#code").siblings(".t_info").children("i").html("<font color='#ff0000'>验证码不正确！</font>");
							return false;
						}
					}
				})
			}
		}
    });
</script>

<body>
    <div class="bg-body">
        <div class="login-box">
        	<div class="login-title">
            	欢迎注册<Span>已有账户？去<a href="login.php" target="_blank">登录</a></Span>
            </div>
            <form method="post" action="register_deal.php?act=add">
                <ul>
                    <li class="user"><img src="images/li——1.png" alt="账户"><input id="user" type="text" name="user" placeholder="请输入账户名" disableautocomplete="" autocomplete="off"/><div class="t_info"><i>账户名必须是由字母开头并且包括数字和符号的6-10位字符！</i></div></li>
                    <li class="paw"><img src="images/li——2.png" alt="密码"><input id="pwd" type="password" name="password" placeholder="请输入密码" disableautocomplete="" autocomplete="off"/><div class="t_info"><i>建议密码设置为由字母、数字和符号组成的8-16位字符！</i></div></li>
                    <li class="paw"><img src="images/li——2.png" alt="确认密码"><input id="pwda" type="password" name="passworda" placeholder="请再一次输入密码" disableautocomplete="" autocomplete="off" /><div class="t_info"><i>请再一次输入密码！</i></div></li>
                    <li class="sex"><span><img src="images/li——8.png" alt="性别"></span>
                    <input id="u_sex_man" value="1" name="sex" checked="checked" autocomplete="off" type="radio"> 
                    <label for="u_sex_man">男</label>
                    <input id="u_sex_woman" value="0" name="sex" autocomplete="off" type="radio"> 
                    <label for="u_sex_woman">女</label>
                    </li>
                    <li class="phone"><img src="images/li——4.png" alt="手机号"><input id="phone" type="text" name="phone" placeholder="请输入你常用的手机号码" disableautocomplete="" autocomplete="off"/><div class="t_info"><i>请输入你常用的手机号码</i></div></li>
                    <li class="e_mail"><img src="images/li——5.png" alt="邮箱"><input id="email" type="text" name="email" placeholder="请输入你的邮箱地址" disableautocomplete="" autocomplete="off"/><div class="t_info"><i>请输入你的邮箱地址</i></div></li>
                    <li class="verification_code"><img src="images/li——3.png" alt="verification_code"><input id="code" type="text" name="code" placeholder="请输入右边的验证码" name="code" disableautocomplete="" autocomplete="off" /><div class="code"><img src="identifCode.php" onclick="this.src='identifCode.php?'+Math.random();"></div><div class="t_info"><i>请输入验证码！</i></div></li>
                    <li class="button"><input id="submit" type="submit" value="注册"/></li>
                </ul>
            </form>
        </div>
    </div>
    <footer class="foot">
        <p>博客 Design by IxxxSmile 粤ICP备555xxxx3号-x</p>
    </footer>    
</body>
</html>