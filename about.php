<? 
	require("Include/mysql_open.php");
	$sql="select * from `my_artonce` where `Id`=1";
	$result=mysql_query($sql);
	$result_arr=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/1_base.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/about.css">
  <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<title>我的博客 - <? echo $result_arr["title"]?></title>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		//0f 滑动门 start
		$(".nav li").each(function(n){
			$(".tuijian-con ul:eq(0)").show().siblings().hide();
			$(this).mouseenter(function(){
				$(this).addClass("active").siblings().removeClass("active");
				$(".tuijian-con ul:eq("+n+")").show().siblings().hide();
			})
		})
		//0f 滑动门 end
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
		//点击菜单over
    });
</script>

<body>
	<div class="body">
        <div class="header_body">
            <div class="logo">
                <img src="images/bk_logo.png" alt="logo" style="width:40px; height:40px; border-radius:20px; overflow:hidden" />
            </div>
            <div class="master">	
                <p><a href="index.php" target="_blank">才先</a>博客<span class="glyphicon glyphicon-menu-down"></span></p>
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
                    <li><a class="bgcolor-12" href="riji.php" target="_blank">日记</a></li>
                    <li><a class="bgcolor-12" href="photo.php" target="_blank">相册</a></li>
                    <li><a class="bgcolor-11" href="about.php" target="_blank">关于</a></li>
                    <li><a class="bgcolor-12" href="guestbook.php" target="_blank">留言</a></li>
                </ul>
            </div>
        </div>
        <div class="main clearfix">
            <div class="main-left">
                <div class="main-page">
                    当前位置：&nbsp;<a href="">首页</a>&nbsp;>&nbsp;<? echo $result_arr["title"]?>
                </div>
                <div class="left-art">
                    <div class="article-top">
                    	<h3 class="h3"><? echo $result_arr["title"]?></h3>
                        <p><a href="" ><? echo $result_arr["xiaobian"]?></a><span><? echo $result_arr["addtime"]?></span></p>
                    </div>
                    <p>
                    	<? echo $result_arr["content"]?>
                    </p>
                </div>
            </div>
            <div class="main-right">
                <div class="right-intro">
                    <h4 class="h4"><span class="glyphicon glyphicon-user"></span>关于博主</h4>
                    <? 
						$sql_session="select * from `my_user` where `Id`=3";
						$result_session=mysql_query($sql_session);
						$result_arr_session=mysql_fetch_array($result_session);
					?>
                    <div class="intro-img">
                        <img src="<? echo $result_arr_session["header_photo"]?>" alt="这里是博主头像" style="width:300px; height:300px; overflow:hidden"/>
                    </div>
                    <p class="type-1"><span class="info-type">昵称：</span><span class="type-info"><? echo $result_arr_session["name"]?></span></p>
                    <p class="type-2"><span class="info-type">性别：</span><span class="type-info"><?
                    if($result_arr_session["sex"]==1){
						echo "男";
					}else{
						echo "女";
					}
					?></span></p>
                    <p class="type-3"><span class="info-type">职业：</span><span class="type-info"><? echo $result_arr_session["zhiye"]?></span></p>
                    <p class="type-4"><span class="info-type">爱好：</span><span class="type-info"><? echo $result_arr_session["hobby"]?></span></p>
                </div>
                <div class="right-tuijian">
                    <div class="container tuijian-up">
                      <h1 class="tuijian-title h3">图文推荐</h1>
                      <ul class="nav nav-tabs">
                            <li class="active"><a>最新文章</a></li>
                            <li><a>推荐文章</a></li>
                      </ul>
                    </div>
                    <div class="tuijian-con">
                        <ul>
                            <!--循环体开始-->
                            <?
								$sql_art_list_n="select * from `my_article` where `classId`=2 order by `addtime` limit 8";
								$result_art_list_n=mysql_query($sql_art_list_n);
								while($result_arr_art_list_n=mysql_fetch_array($result_art_list_n)){
							?>
                            <a href="article.php?Id=<? echo $result_arr_art_list_n["Id"]?>" target="_blank"><li><? echo $result_arr_art_list_n["title"]?><span><? echo $result_arr_art_list_n["addtime"]?></span></li></a>
                            <? }?>
                            <!--循环体结束-->
                        </ul>
                        <ul>
                            <!--循环体开始-->
                            <?
								$sql_art_list_r="select * from `my_article` where `isRecommended`='1' and `classId`=2 order by `addtime` limit 8";
								$result_art_list_r=mysql_query($sql_art_list_r);
								while($result_arr_art_list_r=mysql_fetch_array($result_art_list_r)){
							?>
                            <a href="article.php?Id=<? echo $result_arr_art_list_r["Id"]?>" target="_blank"><li><? echo $result_arr_art_list_r["title"]?><span><? echo $result_arr_art_list_r["addtime"]?></span></li></a>
                            <? }?>
                            <!--循环体结束-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer class="foot">
            <p>博客 Design by IxxxSmile 粤ICP备555xxxx3号-x</p>
        </footer><!---->
    </div>
</body>
</html>