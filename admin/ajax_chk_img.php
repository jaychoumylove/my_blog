<?
	require("Include/mysql_open.php");
	$img_show=$_GET["img_show"];
	$width=imagesx($img_show);
	$height=imagesy($img_show);
	echo $width.$height;
?>