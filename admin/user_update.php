<?
	require("Include/mysql_open.php");
	require("Include/ck_session.php");
	
	$Id=@$_GET["Id"];
	if(empty($Id)){
		echo "<script>window.location.href='user.php';alert('非法入侵！');</script>";
	}
	//第三步 执行SQL语句
	$sql="select * from `my_user` where Id=".$Id;
	$result=mysql_query($sql);
	// 第四步 从结果集取出数据 转换为数组
	$result_arr=mysql_fetch_array($result)
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="js/select-ui.min.js"></script>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#content7', {
			allowFileManager : true
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">修改用户信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>用户信息</span></div>
    
    
	<ul class="forminfo">
 	<form action="user_deal.php?act=update" method="post" enctype="multipart/form-data">
    <li><label>用户名<b>*</b></label><? echo $result_arr["user"];?><input name="user" type="hidden" class="dfinput" value="<? echo $result_arr["user"];?>"  />	<input name="myId" type="hidden"  value="<? echo $result_arr["Id"];?>"  /></li> 
    <li><label>密码<b>*</b></label>
    <input name="password" type="password" class="dfinput" value=""  />
    <input name="password1" type="hidden" class="dfinput" value="<? echo $result_arr["password"];?>"  />
    
    </li> 
    <li><label>性别<b>*</b></label>
    <? if($result_arr["sex"]=="1"){?>
    <input name="sex" type="radio" value="1"  checked="checked"/> 男 
    <input name="sex" type="radio"  value="0"  /> 女
    <? }else{ ?>
    <input name="sex" type="radio" value="1"  /> 男 
    <input name="sex" type="radio"  value="0" checked="checked" /> 女    
    <? }?>
    
    </li>
    <li><label>头像<b>*</b></label><input type="file" name="txUpload" class="file_mr" /><input name="header_photo_admin" type="hidden" class="dfinput" value="<? echo $result_arr["header_photo_admin"];?>"  /><input name="header_photo" type="hidden" class="dfinput" value="<? echo $result_arr["header_photo"];?>"  /></li> 
    <li><label>昵称<b>*</b></label><input name="name" type="text" class="dfinput" value="<? echo $result_arr["name"];?>"  /></li>
    <li><label>职业<b>*</b></label><input name="zhiye" type="text" class="dfinput" value="<? echo $result_arr["zhiye"];?>"  /></li>
    <li><label>爱好<b>*</b></label><textarea id="content7" name="hobby" style="width:700px;height:250px;visibility:hidden;"><? echo $result_arr["hobby"];?></textarea></li>
    <li><label>手机号码<b>*</b></label><input name="phone" type="text" class="dfinput" value="<? echo $result_arr["phone"];?>"  /></li>
    <li><label>邮箱<b>*</b></label><input name="email" type="text" class="dfinput" value="<? echo $result_arr["email"];?>"  /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    </ul>    

 

</body>

</html>
