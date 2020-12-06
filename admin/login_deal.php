<?
	require("Include/mysql_open.php");
	
	$act=$_GET["act"];
	
	if($act=="login"){
		$adminname=$_POST["adminname"];
		$adminpwd=$_POST["adminpwd"];
		$admincode=$_POST["admincode"];
		/*exit($admincode);*/
		if($adminname=="" &&  $adminpwd==""){//为了安全性 服务器验证
			exit("<script>alert('用户名和密码不能为空！');window.location.href='login.php'</script>");
		}
		if($admincode!=$_SESSION["admincode"]){//为了安全性 服务器验证
			exit("<script>alert('验证码失败！');window.location.href='login.php'</script>");
		}
		$sql="select * from `my_admin` where (`adminname`='".$adminname."' and `adminpwd`='".md5($adminpwd)."');";
		//exit($sql);
		$result=mysql_query($sql);
		$rows_num=mysql_num_rows($result);
		if($result && $rows_num){
			
			$_SESSION["adminname"]=$adminname;
			
			exit("<script>alert('登录成功！');window.location.href='main.php'</script>");
		}else{
			exit("<script>alert('登录失败！');window.location.href='login.php'</script>");
		}
		
	}else if($act=="unset"){
		session_unset();
		session_destroy();
		exit("<script>alert('退出成功！');window.location.href='login.php'</script>");
	}else{
	}
?>