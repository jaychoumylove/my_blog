<?
	require("Include/mysql_open.php");
	require("Include/ck_session.php");
	require("Include/function.php");
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
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
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
    <li><a href="#">文章列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1">添加文章</a></li> 
    <li><a href="#tab2" class="selected">文章查询</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">
   <form action="article_deal.php?act=add" method="post">
    <ul class="forminfo">
    <li><label>文章类别<b>*</b></label>  
    <div class="vocation">
    <select class="select1" name="classId">
   	 <?
    		$sql="select * from `my_article_class`";
	
			$result=mysql_query($sql);
		
			while($result_arr=mysql_fetch_array($result)){
		?>
        <option value="<? echo $result_arr["Id"];?>"><? echo $result_arr["classname"];?></option>
		<?
			}
		?>
        
    </select>
    </div>
    </li>  
   
    <li><label>文章标题<b>*</b></label>
    <input name="title" type="text" class="dfinput" value=""  /> 
    </li> 
     
    <li><label>是否推荐<b>*</b></label>
    <input name="isRecommended" type="radio" value="1"  /> 是 
    <input name="isRecommended" type="radio"  value="0" checked="checked" /> 否
    </li>
    <li><label>编辑<b>*</b></label><input name="xiaobian" type="text" class="dfinput" value=""  />
    </li>  
      
    <li><label>文章内容<b>*</b></label>
    <textarea id="content7" name="content" style="width:700px;height:250px;visibility:hidden;"></textarea>

    </li>        

    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加"/></li>
    </ul>
    </form>
    </div> 
    
    
  	<div id="tab2" class="tabson">
    
    <form action="article.php?act=search" method="post">
    <ul class="seachform">
    <li><label>类别名称</label>  
    <div class="vocation">
    <select class="select3" name="classId">
        <option value="">全部</option>
   	 <?
    		$sql="select * from `my_article_class`";
	
			$result=mysql_query($sql);
		
			while($result_arr=mysql_fetch_array($result)){
		?>
        <option value="<? echo $result_arr["Id"];?>"><? echo $result_arr["classname"];?></option>
		<?
			}
		?>
    </select>
    </div>
    </li>   
	<li><label>文章标题</label><input name="title" type="text" class="scinput" /></li>
    <li><label>编辑</label><input name="xiaobian" type="text" class="scinput" /></li>
    <li><label>审核状态</label>  
    <div class="vocation">
    <select class="select3" name="issure">
        <option value="">全部</option>
        <option value="0">未审核</option>
        <option value="1">通过</option>
        <option value="2">驳回</option>
    </select>
    </div>
    </li>
    <li><label>是否推荐</label>  
    <div class="vocation">
    <select class="select3" name="issure">
        <option value="">全部</option>
        <option value="1">是</option>
        <option value="0">否</option>
    </select>
    </div>
    </li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form>
  <form action="article_deal.php?act=delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="4%"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="7%">文章类别<i class="sort"><img src="images/px.gif" /></i></th>
        <th width="14%">文章标题</th>
        <th width="33%">文章内容（节选）</th>
        <th width="8%">编辑</th>
        <th width="9%">添加时间</th>
        <th width="6%">是否推荐</th>
        <th width="9%">审核状态</th>
        <th width="10%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?
			
			$act=@$_GET["act"];					
			if($act=="search"){
				
				$classId=@$_POST["classId"];
				if(empty($classId)){
					$classId=@urldecode($_GET["classId"]);
				}
				$title=@$_POST["title"];
				if(empty($title)){
					$title=@$_GET["title"];
				}
				$issure=@$_POST["issure"];
				if(empty($issure)){
					$issure=@$_GET["issure"];
				}	
				$isRecommended=@$_POST["isRecommended"];
				if(empty($isRecommended)){
					$isRecommended=@$_GET["isRecommended"];
				}
				$xiaobian=@$_POST["xiaobian"];
				if(empty($xiaobian)){
					$xiaobian=@$_GET["xiaobian"];
				}
				$sql_m="select * from `my_article_class` as a join `my_article` as b on a.Id=b.classId where 1=1 ";
				if($classId!=""){
					$sql_m.= " and b.classId=".$classId." " ;
				}
				if($title!=""){
					$sql_m.= " and (title like '%".$title."%') ";
				}
				if($xiaobian!=""){
					$sql_m.= " and xiaobian=".$xiaobian." " ;
				}
				if($issure!=""){
					$sql_m.= " and issure=".$issure." " ;
				}
				if($isRecommended!=""){
					$sql_m.= " and isRecommended=".$isRecommended." " ;
				}
				$sql_m.=" order by b.Id desc";
				//exit($sql);
			}else{
				$sql_m="select * from `my_article_class` as a join `my_article` as b on a.Id=b.classId order by b.Id desc";
			}		
			
			
			$result=mysql_query($sql_m);
			$rows_num=mysql_num_rows($result);//显示出结果集 的记录数
			
			$pagesize=5;//每一页有5条记录
			
			$page_all=ceil($rows_num/$pagesize);//这里到底是四舍五入还是进一法还是舍余法
			
			$page_now=@ceil($_GET["page_now"]==""?1:$_GET["page_now"]);//当前页码
			
			$offset=($page_now-1)*$pagesize;//根据当前的页码 计算出偏移量

		
        	//第三步 执行SQL语句
			
			if($act=="search"){
				
				$classId=@$_POST["classId"];
				if(empty($classId)){
					$classId=@urldecode($_GET["classId"]);
					                               
				}
				$title=@$_POST["title"];
				if(empty($title)){
					$title=@$_GET["title"];
				}	
				$issure=@$_POST["issure"];
				if(empty($issure)){
					$issure=@$_GET["issure"];
				}
				$isRecommended=@$_POST["isRecommended"];
				if(empty($isRecommended)){
					$isRecommended=@$_GET["isRecommended"];
				}
				$xiaobian=@$_POST["xiaobian"];
				if(empty($xiaobian)){
					$xiaobian=@$_GET["xiaobian"];
				}
				$sql="select * from `my_article_class` as a join `my_article` as b on a.Id=b.classId where 1=1 ";
				
				if($classId!=""){
					$sql.= " and b.classId=".$classId." ";
				}
				if($title!=""){
					$sql.= " and (title like '%".$title."%' ) ";
				}
				if($issure!=""){
					$sql.= " and issure=".$issure." " ;
				}
				if($isRecommended!=""){
					$sql.= " and isRecommended=".$isRecommended." " ;
				}
				if($xiaobian!=""){
					$sql.= " and xiaobian=".$xiaobian." " ;
				}
				$sql.="order by b.Id desc limit ".$offset.",".$pagesize;
				
			}else{
				$sql="select * from `my_article_class` as a join `my_article` as b on a.Id=b.classId order by b.Id desc limit ".$offset.",".$pagesize;
			}
			
			$result=mysql_query($sql);
		
			while($result_arr=mysql_fetch_array($result)){
		?>
        <tr>
        <td><input name="checkbox_Id[]" type="checkbox" value="<? echo $result_arr["Id"];?>"  class="checkbox_Id"/>  </td>
        <td><? echo $result_arr["classname"];?></td>
        <td><? echo $result_arr["title"];?></td>
        <td><? echo cutstr_html($result_arr["content"],50)?></td>
        <td><? echo $result_arr["xiaobian"];?></td>
        <td><? echo $result_arr["addtime"];?></td>
        <td>
        <? 
			if($result_arr["isRecommended"]==0){
				echo "否";
			}else{
				echo "是";
			}
		
		?>
        </td>
        <td>
        <? 
			if($result_arr["issure"]==0){
				echo "未审核";
			}else if($result_arr["issure"]==1){
				echo "通过";
			}else{
				echo "驳回";
			}
		?>
        </td>
		
        <td><a href="article_update.php?Id=<? echo $result_arr["Id"];?>" class="tablelink"> 查看/审核</a>    <a href="article_deal.php?Id=<? echo $result_arr["Id"];?>&act=del" class="tablelink"> 删除</a></td>
        </tr> 
       <? }?>
       
       <tr>
        <td colspan="2"><a class="tablelink click">删除全部</a></td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr> 
        </tbody>
    </table>
    
   <div class="pagin">
    	<div class="message">共<i class="blue"><? echo $rows_num;?></i>条记录，当前显示第&nbsp;<i class="blue"><? echo $page_now;?>&nbsp;</i>页，总共&nbsp;<i class="blue"><? echo $page_all;?>&nbsp;</i>页   &nbsp;&nbsp;&nbsp; 
        
        	<?
				$m="";
				if(@$classId!="" || @$title!="" || @$isRecommended!="" || @$issure!=""){
					$m.="&act=search";
				}
				if(@$classId!=""){
					$m.="&classId=".urlencode($classId);
				}if(@$title!=""){
					$m.="&title=".urlencode($title);
				}
				if(@$isRecommended!=""){
					$m.="&isRecommended=".urlencode($isRecommended);
				}
				if(@$issure!=""){
					$m.="&issure=".urlencode($issure);
				}          
			 ?>
        
        
            <? if($page_now==1){ ?>   
                <b>首页</b>
                <b>上一页</b> 
            <? }else{?>
                <b><a href="article.php?page_now=1<? echo $m;?>" class="blue">首页</a></b> 
                <b><a href="article.php?page_now=<? echo $page_now-1 ;?><? echo $m;?>" class="blue">上一页</a></b>            
            <? }?>
             
             <? if($page_now==$page_all){ ?>  
                <b>下一页</b> 
            	<b>尾页</b>           
             <? }else{?>
            	<b><a href="article.php?page_now=<? echo $page_now+1 ;?><? echo $m;?>" class="blue">下一页</a></b> 
            	<b><a href="article.php?page_now=<? echo $page_all;?><? echo $m;?>" class="blue">尾页</a></b>  
              <? }?>     
       </div>
        
    </div>
  	<div class="tip">
     <div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的删除？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="submit"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div> 
    
	</form>
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
	   
    
    
    
    </div>


</body>

</html>
