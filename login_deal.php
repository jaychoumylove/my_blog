<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	
	if($act=="login"){
		$user=$_POST["user"];
		$password=md5($_POST["password"]);
		if($user=="" &&  $password==""){//为了安全性 服务器验证
			exit("<script>alert('用户名和密码不能为空！');window.location.href='login.php'</script>");
		}
		$sql="select * from `my_user` where `user`='".$user."' and `password`='".$password."'";
		$result=mysql_query($sql);
		$rows_num=mysql_num_rows($result);
		if($result && $rows_num){
			$_SESSION["user"]=$user;
			exit("<script>alert('登录成功！');window.location.href='index.php'</script>");
		}else{
			exit("<script>alert('登录失败！');window.location.href='login.php'</script>");
		}
	}else if($act=="cancellation"){
		unset($_SESSION["user"]);
		exit("<script>alert('注销成功！');window.location.href='index.php'</script>");
	}else if($act=="switch"){
		unset($_SESSION["user"]);
		exit("<script>window.location.href='login.php'</script>");
	}else if($act=="youke"){
		$num=mt_rand(100000,999999);
		$user="游客".$num;
		$_SESSION["user"]=$user;
		//exit($ordernum.$user.$_SESSION["user"]);
		exit("<script>window.location.href='index.php';alert('登录成功！')</script>");
	}
?>