<?
	require("Include/mysql_open.php");
	$act=$_GET["act"];
	
	if($act=="update"){//执行修改操作
		$myId=$_POST["myId"];
		$user=$_POST["user"];
		$password=$_POST["password"];
		if(empty($password)){
			$password1=$_POST["password1"];
		}else{
			$password1=md5($password);
		}
		$hobby=$_POST["hobby"];
		$zhiye=$_POST["zhiye"];
		$sex=$_POST["sex"];
		$name=$_POST["name"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		if($_FILES["txUpload"]["name"]==""){
			$header_photo_admin=$_POST["header_photo_admin"];
			$header_photo=$_POST["header_photo"];
		}else{
			$refuselExt="|txe|php|asp|exe|bat|html|";//预定义非法后缀文件名
			//print_r($_FILES["txUpload"]);
			$fileExt_arr=explode(".",$_FILES["txUpload"]["name"]);
			$fileExt=$fileExt_arr[count($fileExt_arr)-1];//利用explode分割文件名，取出后文件名后缀
			//echo $fileExt;
			if(strstr($refuselExt,$fileExt)){
				exit("<script>window.href='user_update.php';alert('不允许上传".$fileExt."类文件');</script>");
			}//校验文件名后缀是否合理！
			$upload_path="../Upload/header/";//创建预存储文件目录
			$upload="Upload/header/";//预定义前台访问目录
			$fileNewname=date("ymdHi_").mt_rand(10000,99999).".".$fileExt;//为文件重命名（防止文件覆盖）
			//echo $_FILES["txUpload"]["error"];
			if(is_uploaded_file($_FILES["txUpload"]["tmp_name"])){//判断文件是否是通过post上传的，防止不合理上传
				if(move_uploaded_file($_FILES["txUpload"]["tmp_name"],$upload_path.$fileNewname)){//将文件移动到新目录
					
					$header_photo_admin=$upload_path.$fileNewname;
					$header_photo=$upload.$fileNewname;
				}else{
					exit("文件上传失败！");
				}
			}else{
				exit("<script>window.href='YG_user_info';alert('拒绝非法插入文件');</script>");
			}
		}
		$sql="update `my_user` set `user`='".$user."', `password`='".$password1."',`name`='".$name."', `hobby`='".$hobby."',`zhiye`='".$zhiye."',`sex`='".$sex."',`email`='".$email."',`phone`='".$phone."',`header_photo_admin`='".$header_photo_admin."',`header_photo`='".$header_photo."' where Id=".$myId;
		//exit($sql);
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='user.php';alert('修改成功！');</script>";
		}else{
			echo "<script>window.location.href='user.php';alert('修改失败！');</script>";
		}
	
		
	}elseif($act=="add"){//执行添加操作
		
		$user=$_POST["user"];
		$password=$_POST["password"];
		$rpassword=$_POST["rpassword"];
		if($rpassword!=$rpassword){
			exit("<script>window.location.href='user.php';alert('密码不一致！！');</script>");
		}
		$sex=$_POST["sex"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$date=date("Y-m-d H:i:s",time());
		
		$sql="insert into my_user(user,password,sex,name,email,phone,addtime) values('".$user."','".md5($password)."','".$sex."','".$name."','".$email."','".$phone."','".$date."')";
		//exit($sql);

		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行数
		
		if($result && $affet_rows){
			echo "<script>window.location.href='user.php';alert('添加成功！');</script>";
		}else{
			echo "<script>window.location.href='user.php';alert('添加失败！');</script>";
		}
	
		
	}elseif($act=="del"){//执行删除
	
		$Id=$_GET["Id"];
		$sql="delete from `my_user` where `Id`=".$Id;
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='user.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='user.php';alert('删除失败！');</script>";
		}		
	}elseif($act=="delAll"){
		$checkbox_Id=$_POST["checkbox_Id"];//获取被选中复选框的值
		 
		$Id_str=implode(",",$checkbox_Id);//把集合按照逗号 合并成字符串
		
		$sql="delete from `my_user` where Id in (".$Id_str.")";
		$result=mysql_query($sql);
		$affet_rows=mysql_affected_rows();//记录受影响行		
		if($result && $affet_rows){
			echo "<script>window.location.href='user.php';alert('删除成功！');</script>";
		}else{
			echo "<script>window.location.href='user.php';alert('删除失败！');</script>";
		}				
		
		
	}




?>