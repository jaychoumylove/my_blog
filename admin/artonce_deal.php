<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	
	if($act=="update"){//执行修改操作
		$myId=$_POST["myId"];
		$title=$_POST["title"];
		$content=$_POST["content"];
		$sql="update `my_artonce` set  `title`='".$title."' , `content`='".$content."' where Id=".$myId;
		//exit($sql);
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='artonce_update.php?Id=".$myId."';alert('修改成功！');</script>";
		}else{
			echo "<script>window.location.href='artonce_update.php?Id=".$myId."';alert('修改失败！');</script>";
		}
	}
?>