<?
	 include ("Include/mysql_open.php");
	 include ("Include/session_chk.php");
	 $content=$_POST["content"];
	 $recomand_name=$_POST["recomand_name"];
	 $recomand_address=$_POST["recomand_address"];
	 if($content==""){
		 exit("<script>window.location.href='".$recomand_address."';alert('请填写你的评论！');</script>");
	 }
	 $date=date("Y-m-d H:i:s",time());
	 if($recomand_address=="http://127.0.0.1:7517/my%20BLOG/guestbook.php"){
		 $sql="insert into my_recomand(content,recomand_name,recomand_address,addtime,issure) values('".$content."','".$recomand_name."','".$recomand_address."','".$date."','1')";
	 }else{
		 $sql="insert into my_recomand(content,recomand_name,recomand_address,addtime) values('".$content."','".$recomand_name."','".$recomand_address."','".$date."')";
	}	 
	//exit($sql);
	$result=mysql_query($sql);
	$affet_rows=mysql_affected_rows();//记录受影响行数
	if($result && $affet_rows){
		echo "<script>window.location.href='".$recomand_address."';alert('评论提交成功！正在审核中...');</script>";
	}else{
		echo "<script>window.location.href='".$recomand_address."';alert('评论失败！');</script>";
		
	}
?>