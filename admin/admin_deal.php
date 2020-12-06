<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	
	if($act=="update"){//执行修改操作
		$myId=$_POST["myId"];
		$adminname=$_POST["adminname"];
		$adminpwd=$_POST["adminpwd"];
		if(empty($adminpwd)){
			$adminpwd1=$_POST["adminpwd1"];
		}else{
			$adminpwd1=md5($adminpwd);
		}
		$sex=$_POST["sex"];
		$realname=$_POST["realname"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		
		$sql="update `my_admin` set `adminname`='".$adminname."', `adminpwd`='".$adminpwd1."',`realname`='".$realname."',`sex`='".$sex."',`email`='".$email."',`phone`='".$phone."' where Id=".$myId;
		//exit($sql);
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='admin.php';alert('修改成功！');</script>";
		}else{
			echo "<script>window.location.href='admin.php';alert('修改失败！');</script>";
		}
	
		
	}elseif($act=="add"){//执行添加操作
		
		$adminname=$_POST["adminname"];
		$adminpwd=$_POST["adminpwd"];
		$radminpwd=$_POST["radminpwd"];
		if($radminpwd!=$radminpwd){
			exit("<script>window.location.href='admin.php';alert('密码不一致！！');</script>");
		}
		$sex=$_POST["sex"];
		$realname=$_POST["realname"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$date=date("Y-m-d H:i:s",time());
		
		$sql="insert into my_admin(adminname,adminpwd,sex,realname,email,phone,addtime) values('".$adminname."','".md5($adminpwd)."','".$sex."','".$realname."','".$email."','".$phone."','".$date."')";
		

		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='admin.php';alert('添加成功！');</script>";
		}else{
			echo "<script>window.location.href='admin.php';alert('添加失败！');</script>";
		}
	
		
	}elseif($act=="del"){//执行删除
		$Id=$_GET["Id"];
		if($Id==1){
			exit("<script>window.location.href='admin.php';alert('admin不可删除！');</script>");
		}
		$sql="delete from `my_admin` where `Id`=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='admin.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='admin.php';alert('删除失败！');</script>";
		}		
	}elseif($act=="delAll"){
		$checkbox_Id=@$_POST["checkbox_Id"];//获取被选中复选框的值
		if($checkbox_Id==""){
			exit("<script>window.location.href='admin.php';alert('请勾选删除项！');</script>");
		}
		for($i=0;$i<count($checkbox_Id);$i++){
			if($checkbox_Id[$i]==1){
				exit("<script>window.location.href='admin.php';alert('admin不可删除！');</script>");
			}
		}
		$Id_str=implode(",",$checkbox_Id);//把集合按照逗号 合并成字符串
		$sql="delete from `my_admin` where Id in (".$Id_str.")";
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='admin.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='admin.php';alert('删除失败！');</script>";
		}	
	}
?>