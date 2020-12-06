<?
	require("Include/mysql_open.php");
	require("Include/ck_session.php");
	
	$Id=@$_GET["Id"];
	if(empty($Id)){
		echo "<script>window.location.href='article.php';alert('非法入侵！');</script>";
	}
	//第三步 执行SQL语句
	$sql="select * from `my_article` where Id=".$Id;
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
    <li><a href="#">查看/审核文章信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>文章信息</span></div>
    
    
	<ul class="forminfo">
 	<form action="article_deal.php?act=update" method="post">
 <li><label>文章类别<b>*</b></label>  
    <div class="vocation">
    <select class="select1" name="classId">
         <?
    		$sql="select * from `my_article_class` where Id=".$result_arr["classId"]; //根据当前文章的类别ID 显示当前类别
			$result=mysql_query($sql);
			$result_array=mysql_fetch_array($result);
			echo " <option value='".$result_array["Id"]."'>".$result_array["classname"]."</option>";
				
		?>	
    
    	 <?
    		$sql="select * from `my_article_class`";
	
			$result=mysql_query($sql);
		
			while($result_array=mysql_fetch_array($result)){
			
		?>
        <option value="<? echo $result_array["Id"];?>"><? echo $result_array["classname"];?></option>
     
        
		<?
			}
		?>
        
    </select>
    
    <input name="myId" type="hidden"  value="<? echo $result_arr["Id"];?>"  />
    </div>
    </li>  
   
    <li><label>文章标题<b>*</b></label>
    <input name="title" type="text" class="dfinput" value="<? echo $result_arr["title"];?>"  /> 
    </li> 
    <li><label>编辑<b>*</b></label><input name="xiaobian" type="text" class="dfinput" value="<? echo $result_arr["xiaobian"];?>"  />
    </li> 
    <li><label>文章内容<b>*</b></label>
    <textarea id="content7" name="content" style="width:700px;height:250px;visibility:hidden;"><? echo $result_arr["content"];?></textarea>
    </li>
    <li><label>是否通过<b>*</b></label>
     <? if($result_arr["isRecommended"]==0){?>   
    <input name="issure" type="radio" value="1"  /> 是 
    <input name="issure" type="radio"  value="0" checked="checked" /> 否
    <? }else{ ?>
     <input name="issure" type="radio" value="1" checked="checked" /> 是 
    <input name="issure" type="radio"  value="0"  /> 否   
    <? }?>
    </li>           
      
      
    
    <li><label>是否推荐<b>*</b></label>
     <? if($result_arr["isRecommended"]==0){?>   
    <input name="isRecommended" type="radio" value="1"  /> 是 
    <input name="isRecommended" type="radio"  value="0" checked="checked" /> 否
    <? }else{ ?>
     <input name="isRecommended" type="radio" value="1" checked="checked" /> 是 
    <input name="isRecommended" type="radio"  value="0"  /> 否   
    <? }?>
    </li>        
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    </ul>    

 

</body>

</html>
