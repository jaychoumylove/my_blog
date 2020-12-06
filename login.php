<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/1_base.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<title>博客 - 登录</title>
</head>

<body>
    <div class="bg-body">
        <div class="login-box">
        	<div class="login-title">
            	欢迎登录<Span>没有账户？去&nbsp;<a href="register.php" target="_blank">注册</a>&nbsp;|&nbsp;作为&nbsp;<a href="login_deal.php?act=youke" target="_blank">游客</a>&nbsp;登录</Span>
            </div>
            <form method="post" action="login_deal.php?act=login">
                <ul>
                    <li>
                        <input type="text" name="user" class="user" placeholder="请输入你的账号" /><i></i>
                    </li>
                    <li>
                        <input type="password" name="password" class="password" placeholder="请输入你的密码" /><i></i>
                    </li>
                    <li>
                        <input type="submit" class="submit" value="登录" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <footer class="foot">
            <p>博客 Design by IxxxSmile 粤ICP备555xxxx3号-x</p>
        </footer>
</body>
</html>