<?
	require("Include/mysql_open.php");
	$code=$_GET["code"];
	if($code!=$_SESSION["code"]){
		echo "no";
	}else{
		echo "ok";
	}
?>