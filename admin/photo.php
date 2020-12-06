<?
	require("Include/mysql_open.php");
	require("Include/ck_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript">
$(function(){	
	//导航切换
	$(".imglist li").click(function(){
		$(".imglist li.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">图片管理</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	<ul class="toolbar">
        <form method="post" action="photo_deal.php?act=add" enctype="multipart/form-data">
        	<li><input type="file" name="filepath"/></li>
            <li><input type="submit" value="上传"/></li>
        </form>
        </ul>
        
    </div>
    
    
    <ul class="imglist"><!--class="imglist"-->
    <?
		$sql="select * from `my_photo`";
		$result=mysql_query($sql);
		$rows_num=mysql_num_rows($result);//显示出结果集 的记录数
		$pagesize=10;//每一页有10条记录
		$page_all=ceil($rows_num/$pagesize);//这里到底是四舍五入还是进一法还是舍余法
		$page_now=@ceil($_GET["page_now"]==""?1:$_GET["page_now"]);//当前页码
		$offset=($page_now-1)*$pagesize;//根据当前的页码 计算出偏移量
		$sql="select * from `my_photo` order by Id desc limit ".$offset.",".$pagesize;
		$result=mysql_query($sql);
		while($result_arr=mysql_fetch_array($result)){
	?>
    <li class="selected">
    <span><img src="<? echo $result_arr["photo_address_admin"];?>"  style="width:168px; height:auto;"/></span>
    <h2><? echo $result_arr["addname"]."于".$result_arr["addtime"]."上传";?></h2>
    <p>&nbsp;&nbsp;<a href="photo_deal.php?act=del&Id=<? echo $result_arr["Id"]?>">删除</a></p>
    </li>
    <?
		}
	?>
    </ul>
    <div class="pagin">
    	<div class="message">共<i class="blue"><? echo $rows_num;?></i>张图片，当前显示第&nbsp;<i class="blue"><? echo $page_now;?>&nbsp;</i>页；一共&nbsp;<i class="blue"><? echo $page_all;?>&nbsp;</i>页</div>
        <ul class="paginList">
        	<? if($page_now==1){ ?>   
                <b>首页</b>
                <b>上一页</b>
            <? }else{?>
                <b><a href="?page_now=1" class="blue">首页</a></b> 
                <b><a href="?page_now=<? echo $page_now-1 ;?>" class="blue">上一页</a></b>    
            <? }?>
             
             <? if($page_now==$page_all){ ?>  
               <b>下一页</b> </li>
               <b>尾页</b> </li>          
             <? }else{?>
            	<b><a href="?page_now=<? echo $page_now+1 ;?>" class="blue">下一页</a></b>
            	<b><a href="?page_now=<? echo $page_all;?>" class="blue">尾页</a></b>
              <? }?> 
        </ul>
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    

</body>

</html>
