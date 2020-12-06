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
    <li><a href="#">用户管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1">添加用户</a></li> 
    <li><a href="#tab2" class="selected">用户管理</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">    
    <ul class="forminfo">
 	<form action="user_deal.php?act=add" method="post" enctype="multipart/form-data">
    <li><label>用户名<b>*</b></label><input name="user" type="text" class="dfinput" value="" /></li> 
    <li><label>密码<b>*</b></label>
    <input name="password" type="password" class="dfinput" value="" />
    </li>
    <li><label>重复密码<b>*</b></label>
    <input name="rpassword" type="password" class="dfinput" value=""  />
    </li>      
    <li><label>性别<b>*</b></label>
    <input name="sex" type="radio" value="先生"  checked="checked"/> 男 
    <input name="sex" type="radio"  value="女士"  /> 女
    </li> 
    
    <li><label>昵称<b>*</b></label><input name="name" type="text" class="dfinput" value=""  /></li>
     <li><label>手机号码<b>*</b></label><input name="phone" type="text" class="dfinput" value=""  /></li>>
    <li><label>邮箱<b>*</b></label><input name="email" type="text" class="dfinput" value=""  /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </form>
    </ul>  
    
    </div> 
    
    
  	<div id="tab2" class="tabson">
    
    <form action="user.php?act=search" method="post">
    <ul class="seachform">
    <li><label>性别</label>  
    <div class="vocation">
    <select class="select3" name="sex">
        <option value="">全部</option>
        <option value="1">先生</option>
        <option value="0">女士</option>
    </select>
    </div>
    </li>   
  
	<li><label>昵称/用户名</label><input name="name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form>
  <form action="user_deal.php?act=delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="7%"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="14%">用户名<i class="sort"><img src="images/px.gif" /></i></th>
        <th width="14%">昵称</th>
        <th width="5%">性别</th>
        <th width="20%">电子邮箱</th>
        <th width="15%">手机号码</th>
        <th width="15%">新增时间</th>
        <th width="10%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?
			
			$act=@$_GET["act"];					
			if($act=="search"){
				
				$sex=@$_POST["sex"];
				if(empty($sex)){
					$sex=@urldecode($_GET["sex"]);
				}
				
				$name=@$_POST["name"];
				if(empty($name)){
					$name=@$_GET["name"];
				}	
				
				$sql_m="select * from `my_user` where 1=1 ";
				if($sex!=""){
					$sql_m.= "and sex='".$sex."' ";
				}
				if($name!=""){
					$sql_m.= "and (name like '%".$name."%' or user like '%".$name."%') ";
				}
				$sql_m.="order by Id desc";
				//exit($sql);
			}else{
				$sql_m="select * from `my_user` order by Id desc";
			}		
			$result=mysql_query($sql_m);
			$rows_num=mysql_num_rows($result);//显示出结果集 的记录数
			
			$pagesize=8;//每一页有8条记录
			
			$page_all=ceil($rows_num/$pagesize);//这里进一法
			
			$page_now=@ceil($_GET["page_now"]==""?1:$_GET["page_now"]);//当前页码
			
			$offset=($page_now-1)*$pagesize;//根据当前的页码 计算出偏移量
		
        	//第三步 执行SQL语句
			
			if($act=="search"){
				
				$sex=@$_POST["sex"];
				if(empty($sex)){
					$sex=@urldecode($_GET["sex"]);
					                               
				}
				$name=@$_POST["name"];
				if(empty($name)){
					$name=@$_GET["name"];
				}	
				$sql="select * from `my_user` where 1=1 ";
				if($sex!=""){
					$sql.= "and sex='".$sex."' ";
				}
				if($name!=""){
					$sql.= "and (name like '%".$name."%' or user like '%".$name."%') ";
				}
				$sql.="order by Id desc limit ".$offset.",".$pagesize;
				//exit($sql);
			}else{
				$sql="select * from `my_user`  order by Id desc limit ".$offset.",".$pagesize;
			}
			
			$result=mysql_query($sql);
		
			while($result_arr=mysql_fetch_array($result)){
		?>
        <tr>
        <td><input name="checkbox_Id[]" type="checkbox" value="<? echo $result_arr["Id"]?>"  class="checkbox_Id"/><img src="<? if($result_arr["header_photo_admin"]){ echo $result_arr["header_photo_admin"];
		}else{ echo "../images/headetx-1.png";
		}?>" style="height:35px; width:35px;vertical-align:middle; border-radius:17px; overflow:hidden;" alt="<? echo $result_arr["user"]?>"/>  </td>
        <td><? echo $result_arr["user"];?></td>
        <td><? echo $result_arr["name"];?></td>
        <td><? if($result_arr["sex"]==0){
			echo "女士";
		}else{
			echo "先生";
			}?></td>
        <td><? echo $result_arr["email"];?></td>
        <td><? echo $result_arr["phone"];?></td>
        <td><? echo $result_arr["addtime"];?></td>

        <td><a href="user_update.php?Id=<? echo $result_arr["Id"];?>" class="tablelink"> 查看/修改</a>    <a href="user_deal.php?Id=<? echo $result_arr["Id"];?>&act=del" class="tablelink"> 删除</a></td>
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
        </tr> 
        </tbody>
    </table>
    
   <div class="pagin">
    	<div class="message">共<i class="blue"><? echo $rows_num;?></i>条记录，当前显示第&nbsp;<i class="blue"><? echo $page_now;?>&nbsp;</i>页，总共&nbsp;<i class="blue"><? echo $page_all;?>&nbsp;</i>页   &nbsp;&nbsp;&nbsp; 
        
        	<?
				$m="";
				if(@$sex!="" || @$name!=""){
					$m.="&act=search";
				}
				if(@$sex!=""){
					$m.="&sex=".urlencode($sex);
				}
				if(@$name!=""){
					$m.="&name=".$name;
				}           
			 ?>
        
        
            <? if($page_now==1){ ?>   
                <b>首页</b>
                <b>上一页</b> 
            <? }else{?>
                <b><a href="user.php?page_now=1<? echo $m;?>" class="blue">首页</a></b> 
                <b><a href="user.php?page_now=<? echo $page_now-1 ;?><? echo $m;?>" class="blue">上一页</a></b>            
            <? }?>
             
             <? if($page_now==$page_all){ ?>  
                <b>下一页</b> 
            	<b>尾页</b>           
             <? }else{?>
            	<b><a href="user.php?page_now=<? echo $page_now+1 ;?><? echo $m;?>" class="blue">下一页</a></b> 
            	<b><a href="user.php?page_now=<? echo $page_all;?><? echo $m;?>" class="blue">尾页</a></b>  
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
