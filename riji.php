<?
	require("Include/mysql_open.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/1_base.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/riji.css">
  <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<title>我的博客 - 日记</title>
</head>
<script type="text/javascript">
	$(document).ready(function(e) {
        //点击菜单start
		var m=1;
		$(".master .glyphicon-menu-down").click(function(){
			if(m==1){
				$(".master .hn-meun").show(500);
				m=m-1;
			}else{
				$(".master .hn-meun").hide(500);
				m=m+1;
			}
		})
		//点击菜单overer
    });
</script>
<body>
	<div class="body">
		<div class="header_body">
            <div class="logo">
                <img src="images/bk_logo.png" alt="logo" style="width:40px; height:40px; border-radius:20px; overflow:hidden" />
            </div>
            <div class="master">	
                <p><a href="index.php" target="_blank">才先</a>de博客<span class="glyphicon glyphicon-menu-down"></span></p>
                <p class="hn-meun">&nbsp;&nbsp;<a href="user.php" target="_blank">查看资料</a>
                <?
				if(@$_SESSION["user"]==""){
				?>
                <a href="login.php" target="_blank">登录</a>
                <? }else{ ?>
                <a href="login_deal.php?act=cancellation" target="_blank">退出</a>
                <? }?>
                </p>
            </div>
            <div class="na_v">
                <ul>
                    <li><a class="bgcolor-12" href="index.php" target="_blank">首页</a></li>
                    <li><a class="bgcolor-12" href="article-list.php" target="_blank">文章</a></li>
                    <li><a class="bgcolor-11" href="riji.php" target="_blank">日记</a></li>
                    <li><a class="bgcolor-12" href="photo.php" target="_blank">相册</a></li>
                    <li><a class="bgcolor-12" href="about.php" target="_blank">关于</a></li>
                    <li><a class="bgcolor-12" href="guestbook.php" target="_blank">留言</a></li>
                </ul>
            </div>
        </div>
        <div class="main">
        	<div class="main-page">
            	当前位置：&nbsp;<a href="">首页</a>&nbsp;>&nbsp;<a href="">日记</a>
            </div>
            <ul class="page-riji">
            <!--循环体start-->
            	<?
					$sql_r="select * from `my_article` where `classId`=1 ";
					$result_r=mysql_query($sql_r);
					$rows_num=mysql_num_rows($result_r);//显示出结果集 的记录数
					
					$pagesize=5;//每一页有5条记录
					
					$page_all=ceil($rows_num/$pagesize);//这里是进一法
					
					if(@$_GET["page_now"]!=""){
						$page_now=@$_GET["page_now"];
					}else{
						$page_now=1;
					}
					//当前页码
					//echo $page_now;
					//echo $page_all;
					$offset=($page_now-1)*$pagesize;//根据当前的页码 计算出偏移量
					$sql="select * from `my_article` where `classId`=1  order by `addtime` desc limit ".$offset.",".$pagesize;
					$result=mysql_query($sql);
					while($result_arr=mysql_fetch_array($result)){ ?>
                	<li>
                        <dl class="dl-horizontal">
                            <dt>
                                <span class="span"><? echo $result_arr["addtime"]?></span>
                            </dt>
                            <dd>
                                <? echo $result_arr["content"]?>
                            </dd>
                        </dl>
                    </li>
                    <? }?>
            <!--循环体over-->    
            </ul>
            <nav aria-label="">
                          <ul class="pagination pagein-right">
                          <? if($page_now==1){
							   }else{?>
                               <li>
                                  <a href="?page_now=<? echo $page_now-1;?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                           <? }?>
                           <li><a href="#"><? echo $page_now;?></a></li>
                           <? if($page_now==$page_all){ 
						    }else{?>
                                <li>
                                  <a href="?page_now=<? echo $page_now+1;?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                           <? }?>
                          </ul>
                        </nav>
        </div>
        <footer class="foot">
            <p>博客 Design by IxxxSmile 粤ICP备555xxxx3号-x</p>
        </footer>
    </div>
</body>
</html>