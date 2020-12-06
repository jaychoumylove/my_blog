<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	if($act=="ture"){
		$Id=$_GET["Id"];
		$sql="update `my_recomand` set `issure`='1' where Id=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		if($result && $affet_rows){
			echo "<script>window.location.href='recomand.php';alert('审核成功！');</script>";
		}else{
			echo "<script>window.location.href='recomand.php';alert('审核失败！');</script>";
		}
	}
	if($act=="del"){
		$Id=$_GET["Id"];
		$sql="delete from `my_recomand` where `Id`=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		if($result && $affet_rows){
			echo "<script>window.location.href='recomand.php';alert('审核成功！');</script>";
		}else{
			echo "<script>window.location.href='recomand.php';alert('审核失败！');</script>";
		}
	}
	if($act=="update"){
		$Id=$_POST["myId"];
		$issure=$_POST["issure"];
		$sql="update `my_recomand` set `issure`='".$issure."' where Id=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		if($result && $affet_rows){
			echo "<script>window.location.href='recomand.php';alert('审核成功！');</script>";
		}else{
			echo "<script>window.location.href='recomand.php';alert('审核失败！');</script>";
		}
	}
?>