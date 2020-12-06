<?
	if(@$_SESSION["adminname"]==""){
		exit("<script>alert('您未登录，请登录之后操作后台！');window.location.href='login.php'</script>");
	}
?>