<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	if($act=="add"){
		$user=$_POST["user"];
		$password=$_POST["password"];
		$passworda=$_POST["passworda"];
		$sex=$_POST["sex"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$code=$_POST["code"];
		if($user=="" || $password==""){
			exit("<script>window.location.href='register.php';alert('用户名或密码不能为空！');</script>");
		}
		if($password!=$passworda){
			exit("<script>window.location.href='register.php';alert('密码不一致！');</script>");
		}
		if(!preg_match("/^[a-zA-Z]\w{5,9}$/",$user)){
			exit("<script>window.location.href='register.php';alert('用户名格式不正确！');</script>");
		}
		if(!preg_match("/^\w{8,16}$/",$password)){
			exit("<script>window.location.href='register.php';alert('建议密码设置为由字母、数字和符号组成的8-16位字符！');</script>");
		}
		$sql="select * from `my_user` where `user`='".$user."';";
		//exit($sql);
		$result=mysql_query($sql);
		$affected_rows=mysql_affected_rows();
		if($affected_rows){
			exit("<script>window.location.href='register.php';alert('该用户名已经存在！')</script>");
		}
		if(!preg_match("/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/",$phone)){
			exit("<script>window.location.href='register.php';alert('手机号码不正确！');</script>");
		}
		if(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/",$email)){
			exit("<script>window.location.href='register.php';alert('邮箱格式不正确！');</script>");
		}
		if($code!=$_SESSION["code"]){
			exit("<script>window.location.href='register.php';alert('验证码错误！');</script>");
		}
		$date=date("Y-m-d H:i:s",time());
		$sql_r="insert into `my_user`(`user`,`password`,`phone`,`email`,`addtime`,`sex`) values('".$user."','".md5($password)."','".$phone."','".$email."','".$date."','".$sex."')";
		//exit($sql_r);
		$result_r=mysql_query($sql_r);
		$affet_rows_r=mysql_affected_rows();//记录受影响行数
		if($result_r && $affet_rows_r){
			echo "<script>window.location.href='login.php';alert('注册成功！');</script>";
		}else{
			echo "<script>window.location.href='register.php';alert('注册失败！');</script>";
		}
	}
?>