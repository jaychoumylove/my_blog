<?
	require("Include/mysql_open.php");
	$sql="select * from `my_user` where `Id`=3";
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
  <link rel="stylesheet" type="text/css" href="css/user.css">
  <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<title>我的博客 - 资料</title>
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
		//点击菜单ove
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
                    <li><a class="bgcolor-12" href="riji.php" target="_blank">日记</a></li>
                    <li><a class="bgcolor-12" href="photo.php" target="_blank">相册</a></li>
                    <li><a class="bgcolor-12" href="about.php" target="_blank">关于</a></li>
                    <li><a class="bgcolor-12" href="guestbook.php" target="_blank">留言</a></li>
                </ul>
            </div>
        </div>
        <div class="main clearfix">
            <div class="main-left">
                <div class="main-page">
                    当前位置：&nbsp;<a href="">首页</a>&nbsp;>&nbsp;<a href="">博主资料</a>
                </div>
                <div class="left-info">
                	<h3><span class="glyphicon glyphicon-bookmark"></span>博主资料</h3>
                    <dl class="dl-horizontal">
                    	<dt>博主账户</dt>
                        <dd><? echo $result_arr["user"]?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主昵称</dt>
                        <dd><? if($result_arr["name"]==""){ echo "还没有啦！";}else{ echo $result_arr["name"];}?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主性别</dt>
                        <dd><? if($result_arr["sex"]==1){ echo "男";}else{ echo "女";}?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主职业</dt>
                        <dd><? echo $result_arr["zhiye"]?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主手机</dt>
                        <dd><? echo $result_arr["phone"]?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主邮箱</dt>
                        <dd><? echo $result_arr["email"]?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                    	<dt>博主爱好</dt>
                        <dd><? echo $result_arr["hobby"]?></dd>
                    </dl>
                </div>
                <!--<div class="update_info">
                	<form action="" method="post" enctype="multipart/form-data">
                        <h1>修改资料</h1>
                        <ul>
                            <input type="hidden" value="" name="act" id="act" />
                            <input type="hidden" value="" name="myId" id="myId"/>
                            <li class="sh_name">账户：博主名xxx</li>
                            <li class="sh_name">密码：<input type="password" name="name" id="sh_name" placeholder="请输入新密码，清空即取消" disableautocomplete="" autocomplete="off"/></li>
                            <li class="sh_name">职业：<input type="text" name="name" id="sh_name" placeholder="请输入职业" disableautocomplete="" autocomplete="off"/></li>
                            <li class="sh_name">爱好：<input type="text" name="name" id="sh_name" placeholder="请输入爱好" disableautocomplete="" autocomplete="off"/></li>
                            <li class="inp_pho">联系电话：<input type="text" id="inp_pho" name="phonenumber" placeholder="请输入联系电话号码" disableautocomplete="" autocomplete="off" /></li>
                            <li class="inp_ads_name">邮编：<input type="text" id="inp_ads_name" name="postcode" placeholder="请输入邮编" disableautocomplete="" autocomplete="off" /></li>
                            <li class="sh_name">头像：<input type="file" name="txUpload" class="file_mr" /></li>
                            <li class="ads_sub"><input class="sure" type="submit" name="sure" value="确认"/><input class="false" id="false" type="button" name="false" value="取消"/></li>
                        </ul>
                    </form>
                </div>-->
            </div>
            <div class="main-right">
                <div class="right-intro">
                    <h4 class="h4"><span class="glyphicon glyphicon-user"></span>关于博主</h4>
                    <div class="intro-img">
                        <img src="<? echo $result_arr["header_photo"]?>" alt="这里是博主头像" style="width:200px; height:200px; overflow:hidden"/>
                    </div>
                    <p class="type-1"><span class="info-type">昵称：</span><span class="type-info"><? echo $result_arr["name"]?></span></p>
                    <p class="type-2"><span class="info-type">性别：</span><span class="type-info"><? if($result_arr["user"]==1){ echo "男";}else{ echo "女";}?></span></p>
                    <p class="type-3"><span class="info-type">职业：</span><span class="type-info"><? echo $result_arr["zhiye"]?></span></p>
                    <p class="type-4"><span class="info-type">爱好：</span><span class="type-info"><? echo $result_arr["hobby"]?></span></p>
                </div>
            </div>
        </div>
        <footer class="foot">
            <p>博客 Design by IxxxSmile 粤ICP备555xxxx3号-x</p>
        </footer><!---->
    </div>
</body>
</html>