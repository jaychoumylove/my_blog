<?
	require("Include/mysql_open.php");
	require("Include/ck_session.php");
	
	$Id=@$_GET["Id"];
	if(empty($Id)){
		echo "<script>window.location.href='recomand.php';alert('非法入侵！');</script>";
	}
	//第三步 执行SQL语句
	$sql="select * from `my_recomand` where Id=".$Id;
	$result=mysql_query($sql);
	// 第四步 从结果集取出数据 转换为数组
	$result_arr=mysql_fetch_array($result);
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
    <li><a href="#">查看/修改评论信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>评论信息</span></div>
    
    
	<ul class="forminfo">
 	<form action="recomand_deal.php?act=update" method="post">
    <li><label>评论用户名<b>*</b></label><? echo $result_arr["recomand_name"];?><input name="recomand_name" type="hidden" class="dfinput" value="<? echo $result_arr["recomand_name"];?>"  />	<input name="myId" type="hidden"  value="<? echo $result_arr["Id"];?>"  /></li> 
    <li><label>评论时间<b>*</b></label><? echo $result_arr["addtime"];?></li> 
    <li><label>评论地址<b>*</b></label><a href="<? echo $result_arr["recomand_address"];?>"><? echo $result_arr["recomand_address"];?></a></li>
    <li><label>评论内容<b>*</b></label><p><? echo $result_arr["content"];?></p></li>
    <li><label>审核<b>*</b></label>
    <? if($result_arr["issure"]=="0"){?>
    <input name="issure" type="radio" value="0"  checked="checked" /> 待审核 
    <input name="issure" type="radio" value="1" /> 通过 
    <input name="issure" type="radio"  value="2"  /> 驳回
    
    <? }else if($result_arr["issure"]=="1"){ ?>
    <input name="issure" type="radio" value="0"  /> 待审核 
    <input name="issure" type="radio" value="1"  checked="checked"/> 通过 
    <input name="issure" type="radio"  value="2"  /> 驳回
    <? }else{?>
    <input name="issure" type="radio" value="0"  /> 待审核 
    <input name="issure" type="radio" value="1" /> 通过 
    <input name="issure" type="radio"  value="2"  checked="checked" /> 驳回
    <? } ?>
    </li> 
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    </ul>    

 

</body>

</html>
