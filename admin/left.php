<?
	require("Include/mysql_open.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		
		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}
			
			
		}
	});
	
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#fff3e1;">
	<div class="lefttop"><span></span>功能列表</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="images/leftico01.png" /></span>管理信息
    </div>
    	<ul class="menuson">

        <li>
            <div class="header">
            <cite></cite>
            <a target="rightFrame">文章管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="article_class.php" target="rightFrame">文章类别</a></li>
            <li><a href="article.php" target="rightFrame">文章列表</a></li>
            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a target="rightFrame">单文章管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <?
			$sql="select * from `my_artonce` order by Id desc";
			$result=mysql_query($sql);
			while($result_arr=mysql_fetch_array($result)){
			?>
            <li><a href="artonce_update.php?Id=<? echo $result_arr["Id"];?>" target="rightFrame"><? echo $result_arr["title"];?></a></li>
 			<? } ?>
            </ul>
        </li> 
		<li>
            <div class="header">
            <cite></cite>
            <a href="user.php"target="rightFrame">用户管理</a>
            <i></i>
            </div>              
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="recomand.php"target="rightFrame">评论管理</a>
            <i></i>
            </div>              
        </li> 
        <li>
            <div class="header">
            <cite></cite>
            <a href="photo.php"target="rightFrame">相册管理</a>
            <i></i>
            </div>              
        </li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="images/leftico02.png" /></span>其他设置
    </div>
    <ul class="menuson">
  		<li><cite></cite><a href="admin.php" target="rightFrame">管理员管理</a><i></i></li>
        </ul>     
    </dd> 
    
    

    
  
    
    </dl>
    
</body>
</html>
