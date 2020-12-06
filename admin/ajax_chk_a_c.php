<?
	require("Include/mysql_open.php");
	$classname=$_GET["classname"];
	$sql="select * from `my_article_class` where `classname`='".$classname."';";
	//exit($sql);
	$result=mysql_query($sql);
	$affected_rows=mysql_affected_rows();
	if($affected_rows){
		exit("<font color='#ff0000'>该类别已经存在！</font>");
	}else{
		echo "<font color='#00ff00'>该类别可以添加！</font>";
	}
?>