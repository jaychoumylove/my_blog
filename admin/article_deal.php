<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	
	if($act=="update"){//执行修改操作
		$title=$_POST["title"];
		$isRecommended=$_POST["isRecommended"];
		$xiaobian=$_POST["xiaobian"];
		$issure=$_POST["issure"];
		$content=$_POST["content"];
		$myId=$_POST["myId"];
		$date=date("Y-m-d H:i:s",time());

		$sql="update `my_article` set `title`='".$title."' ,`issure`='".$issure."' , `isRecommended`='".$isRecommended."' , `xiaobian`='".$xiaobian."' , `content`='".$content."' , `addtime`='".$date."' where Id=".$myId;
		//exit($sql);
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='article.php';alert('修改成功！');</script>";
		}else{
			echo "<script>window.location.href='article.php';alert('修改失败！');</script>";
		}
	
		
	}elseif($act=="add"){//执行添加操作
		$title=$_POST["title"];
		$classId=$_POST["classId"];
		$isRecommended=$_POST["isRecommended"];
		$xiaobian=$_POST["xiaobian"];
		$content=$_POST["content"];
		$date=date("Y-m-d H:i:s",time());

		$sql="insert into `my_article`(title,classId,isRecommended,xiaobian,content,addtime) values('".$title."','".$classId."','".$isRecommended."','".$xiaobian."','".$content."','".$date."')";
		//exit($sql);
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		if($result && $affet_rows){
			echo "<script>window.location.href='article.php';alert('添加成功！');</script>";
		}else{
			echo "<script>window.location.href='article.php';alert('添加失败！');</script>";
		}
	
		
	}elseif($act=="del"){//执行删除
	
		$Id=$_GET["Id"];
		$sql="delete from `my_article` where `Id`=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='article.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='article.php';alert('删除失败！');</script>";
		}		
	}elseif($act=="delAll"){
		$checkbox_Id=$_POST["checkbox_Id"];//获取被选中复选框的值
		 
		$Id_str=implode(",",$checkbox_Id);//把集合按照逗号 合并成字符串
		
		$sql="delete from `my_article` where Id in (".$Id_str.")";
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='article.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='article.php';alert('删除失败！');</script>";
		}				
		
		
	}




?>