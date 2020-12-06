<?
	require("Include/mysql_open.php");
	$user=$_GET["user"];
	$sql="select * from `my_user` where `user`='".$user."';";
	//exit($sql);
	$result=mysql_query($sql);
	$affected_rows=mysql_affected_rows();
	if($affected_rows){
		echo "no";
	}else{
		echo "ok";
	}
?>