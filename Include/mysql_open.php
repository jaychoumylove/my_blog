<?
	header("Content-type:text/html;charset=utf-8");
	session_start();
	//第一步 连接服务器
	@mysql_connect("127.0.0.1:3306","root","root") or exit("数据库连接失败！");
	//第一步 选择数据库
	mysql_select_db("my_glob")or exit("数据库选择失败！");
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	

	
?>