<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	$date=date("Y-m-d H:i:s",time());
	if($act=="add"){
		$refuselExt="|txe|php|asp|exe|bat|html|";//预定义非法后缀文件名
		//print_r($_FILES["filepath"]);
		$fileExt_arr=explode(".",$_FILES["filepath"]["name"]);
		$fileExt=$fileExt_arr[count($fileExt_arr)-1];//利用explode分割文件名，取出后文件名后缀
		//echo $fileExt;
		if(strstr($refuselExt,$fileExt)){
			exit("<script>window.href='photo.php';alert('不允许上传".$fileExt."类文件');</script>");
		}//校验文件名后缀是否合理！
		$upload_path="../Upload/";//创建预存储文件目录
		$upload="Upload/";//预定义前台访问目录
		$fileNewname=date("ymdHi_").mt_rand(10000,99999).".".$fileExt;//为文件重命名（防止文件覆盖）
		//echo $_FILES["filepath"]["error"];
		if(is_uploaded_file($_FILES["filepath"]["tmp_name"])){//判断文件是否是通过post上传的，防止不合理上传
			if(move_uploaded_file($_FILES["filepath"]["tmp_name"],$upload_path.$fileNewname)){//将文件移动到新目录
				$photosrc=$upload_path.$fileNewname;
				$photo_src=$upload.$fileNewname;
				$photosize=$_FILES["filepath"]["size"];
				$sql="insert into `my_photo`(`photo_address_admin`,`photo_address`,`addname`,`addtime`) values('".$photosrc."','".$photo_src."','qcx233666','".$date."')";
				$result=mysql_query($sql);
				$affet_rows=mysql_affected_rows();//记录受影响行数
				if($result && $affet_rows){
					echo "<script>window.location.href='photo.php';alert('图片上传成功！文件名暂时为".$fileNewname."！');</script>";
				}else{
					echo "<script>window.location.href='photo.php';alert('文件上传失败！233');</script>";
				}
			}else{
				echo "文件上传失败！";
			}
		}else{
			exit("<script>window.href='photo.php';alert('拒绝非法插入文件');</script>");
		}
	}else if($act=="del"){
		$Id=$_GET["Id"];
		$sql_fn="select * from `my_photo` where `Id`=".$Id;
		$result_fn=mysql_query($sql_fn);
		$result_arr_fn=mysql_fetch_array($result_fn);
		if(@unlink($result_arr_fn["photo_address_admin"])){
			$sql="delete from `my_photo` where `Id`=".$Id;
			$result=mysql_query($sql);
			$affet_rows=mysql_affected_rows();//记录受影响行		
			if($result && $affet_rows){
				echo "<script>window.location.href='photo.php';alert('删除图片文件成功！');</script>";
			}else{
				echo "<script>window.location.href='photo.php';alert('删除图片数据失败！');</script>";
			}		
		}else{
			echo "<script>window.location.href='photo.php';alert('删除图片文件失败！');</script>";
		}
	}
	
	
?>