<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>充值</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	p{
		text-indent: 2em;
	}
	#aa{display:block;
		position:relative;
		margin:auto;
		width:1280px;
		height:720px;
	}
</style>
<?php
require "conn.php";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$user_sql="select * from user where user_id='$w'";
$user_result=mysqli_query($con,$user_sql);
$user_arr=mysqli_fetch_row($user_result);
$user_id=$user_arr[0];
?>
<script type="text/javascript">
	function display_alert()
	{
		if(confirm("Decide to quit?"))
		{
			location.href="/new/login.php";
		}
	}
</script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">             
				<a class="navbar-brand"  onclick="display_alert()">Steam</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/new/first.php">主页</a></li>
					<li><a href="/new/library.php">库</a></li>
					<li><a href="/new/first.php">社区</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if(isset($_COOKIE['a'])==0){
						echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
					}
					$w=$_COOKIE['a'];
					$user_sql="select * from user where user_id='$w'";
					$user_result=mysqli_query($con,$user_sql);
					$user_arr=mysqli_fetch_row($user_result);
					?>
					<li><a onclick =javascrtpt:window.location.href="/new/library.php"><?php echo '欢迎，'.$user_arr[1].' 余额：'.$user_arr[4]?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<?php

	$user_re_20=$user_arr[4]+20;
	$user_re_50=$user_arr[4]+50;
	$user_re_100=$user_arr[4]+100;
	$user_re_500=$user_arr[4]+500;

	$charge_sql_20="update user set remainder='$user_re_20' where user_id='$user_id'";
// $charge_sql_20_result=mysqli_query($con,$charge_sql_20);
	$charge_sql_50="update user set remainder='$user_re_50' where user_id='$user_id'";
	$charge_sql_100="update user set remainder='$user_re_100' where user_id='$user_id'";
	$charge_sql_500="update user set remainder='$user_re_500' where user_id='$user_id'";

	?>
	<button  style="margin-left:890;margin-top:20" type="button" class="btn btn-lg btn-success "onclick = "javascrtpt:window.location.href='/new/ajax/c_20.php'">充值20</button>

	<button  style="margin-left:890;margin-top:20" type="button" class="btn btn-lg btn-success"onclick = "javascrtpt:window.location.href='/new/ajax/c_50.php'">充值50</button>
	<button  style="margin-left:890;margin-top:20" type="button" class="btn btn-lg btn-success "onclick = "javascrtpt:window.location.href='/new/ajax/c_100.php'">充值100</button>
	<button  style="margin-left:890;margin-top:20" type="button" class="btn btn-lg btn-success "onclick = "javascrtpt:window.location.href='/new/ajax/c_500.php'">充值500</button>