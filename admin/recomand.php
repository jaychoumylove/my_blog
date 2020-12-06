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
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="js/select-ui.min.js"></script>
<script type="text/javascript" src="editor/kindeditor.js"></script>
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
    KE.show({
        id : 'content7',
        cssPath : './index.css'
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
<script type="text/javascript">
$(document).ready(function() {

	$("#checkAll").click(function(){
		
		if(this.checked){
			$(".checkbox_Id").prop("checked",true);
		}else{
			$(".checkbox_Id").prop("checked",false);
		}
		
	});	
	
	
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">评论管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab2" class="selected">评论管理</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab2" class="tabson">
    <form action="recomand.php?act=search" method="post">
    <ul class="seachform">
    <li><label>评论状态</label>  
    <div class="vocation">
    <select class="select3" name="issure">
        <option value="">全部</option>
        <option value="0">未审核</option>
        <option value="1">通过</option>
        <option value="2">驳回</option>
    </select>
    </div>
    </li> 
	<li><label>收货人/用户名</label><input name="recomand_name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form>
  <form action="recomand_deal.php?act=delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="4%"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="11%">评论人</th>
        <th width="33%">评论内容</th>
        <th width="20%">评论地址</th>
        <th width="13%">评论时间</th>
        <th width="7%">评论状态</th>
        <th width="12%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?
			$act=@$_GET["act"];					
			if($act=="search"){
				$recomand_name=@$_POST["recomand_name"];
				if($recomand_name==""){
					$recomand_name=@$_GET["recomand_name"];
				}	
				$issure=@$_POST["issure"];
				if($issure==""){
					$issure=@$_GET["issure"];
				}
				$sql_m="select * from `my_recomand` where 1=1 ";
				if($recomand_name!=""){
					$sql_m.= "and (`recomand_name` like '%".$recomand_name."%') ";
				}
				if($issure!=""){
					$sql_m.= "and `issure`='".$issure."' ";
				}
				$sql_m.="order by Id desc";
				//exit($sql);
			}else{
				$sql_m="select * from `my_recomand` order by Id desc";
			}		
			$result=mysql_query($sql_m);
			$rows_num=mysql_num_rows($result);//显示出结果集 的记录数
			
			$pagesize=8;//每一页有8条记录
			
			$page_all=ceil($rows_num/$pagesize);//这里进一法
			
			$page_now=@ceil($_GET["page_now"]==""?1:$_GET["page_now"]);//当前页码
			
			$offset=($page_now-1)*$pagesize;//根据当前的页码 计算出偏移量
		
        	//第三步 执行SQL语句
			
			$act=@$_GET["act"];					
			if($act=="search"){
				$recomand_name=@$_POST["recomand_name"];
				if($recomand_name==""){
					$recomand_name=@$_GET["recomand_name"];
				}
				$issure=@$_POST["issure"];
				if($issure==""){
					$issure=@$_GET["issure"];
				}
				$sql="select * from `my_recomand` where 1=1 ";
				if($recomand_name!=""){
					$sql.= "and (`recomand_name` like '%".$recomand_name."%') ";
				}
				if($issure!=""){
					$sql.= "and `issure`='".$issure."' ";
				}
				$sql.="order by Id desc";
				//exit($sql);
			}else{
				$sql="select * from `my_recomand` order by Id desc";
			}		
			//echo $sql.$sql_m;
			$result=mysql_query($sql);
			while($result_arr=mysql_fetch_array($result)){
		?>
        <tr>
        <td><input name="checkbox_Id[]" type="checkbox" value="<? echo $result_arr["Id"];?>"  class="checkbox_Id"/>  </td>
        <td><? echo $result_arr["recomand_name"];?></td>
        <td><? echo $result_arr["content"];?></td>
        <td><a href="<? echo $result_arr["recomand_address"];?>" target="_blank" ><? echo $result_arr["recomand_address"];?></a></td>
        <td><? echo $result_arr["addtime"];?></td>
		<td><? 
			if($result_arr["issure"]==0){
				echo "未审核！";
			}
			if($result_arr["issure"]==1){
				echo "通过！";
			}
			if($result_arr["issure"]==2){
				echo "驳回！";
			}
		?></td>
        <td><a href="recomand_info.php?Id=<? echo $result_arr["Id"];?>" class="tablelink"> 查看 </a>  <a href="recomand_deal.php?Id=<? echo $result_arr["Id"];?>&act=ture" class="tablelink"> 通过 </a>  <a href="recomand_deal.php?Id=<? echo $result_arr["Id"];?>&act=del" class="tablelink"> 删除 </a>
       </td>
        </tr> 
       <? }?>
       
       <tr>
        <td colspan="2"><a class="tablelink click">删除全部</a></td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
		<td width="7%">&nbsp;</td>
        <td width="12%">&nbsp;</td>
        </tr> 
        </tbody>
    </table>
    
   <div class="pagin">
    	<div class="message">共<i class="blue"><? echo $rows_num;?></i>条记录，当前显示第&nbsp;<i class="blue"><? echo $page_now;?>&nbsp;</i>页，总共&nbsp;<i class="blue"><? echo $page_all;?>&nbsp;</i>页   &nbsp;&nbsp;&nbsp; 
        
        	<?
				$m="";
				if(@$recomand_name!="" || @$issure!=""){
					$m.="&act=search";
				} 
				if(@$recomand_name!=""){
					$m.="&recomand_name='".$recomand_name."'";
				}
				if(@$issure!=""){
					$m.="&issure='".$issure."'";
				}
			 ?>
            <? if($page_now==1){ ?>   
                <b>首页</b>
                <b>上一页</b> 
            <? }else{?>
                <b><a href="?page_now=1<? echo $m;?>" class="blue">首页</a></b> 
                <b><a href="?page_now=<? echo $page_now-1 ;?><? echo $m;?>" class="blue">上一页</a></b>            
            <? }?>
             
             <? if($page_now==$page_all){ ?>  
                <b>下一页</b> 
            	<b>尾页</b>           
             <? }else{?>
            	<b><a href="?page_now=<? echo $page_now+1 ;?><? echo $m;?>" class="blue">下一页</a></b> 
            	<b><a href="?page_now=<? echo $page_all;?><? echo $m;?>" class="blue">尾页</a></b>  
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
