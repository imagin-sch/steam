<script type="text/javascript">
	function display_alert()
	{
		alert("please login first")
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
					<li><a onclick="display_alert()">主页</a></li>
					<li><a onclick="display_alert()">库</a></li>
					<li><a onclick="display_alert()">社区</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a onclick ="display_alert()">Me</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
	require "conn.php";
	mysqli_query($con,'SET NAMES UTF8');	
	echo "<link href='https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>";
	$name=$_POST['username'];
	$mail=$_POST['mail'];
	$result=mysqli_query($con,"select username,mail from user where username = '$name' ");
	$a=mysqli_fetch_row($result);
	if(!$a){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1 style=\"margin-left:823\">该用户不存在</h1>";			
		echo "<br>";
		echo "<br>";
		echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn-lg btn-success \"onclick = \"javascrtpt:window.location.href='/new/find.php'\">return</button>";
	}

	else if($mail!=$a[1]){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1 style=\"margin-left:810\">邮箱输入错误</h1>";		
		echo "<br>";
		echo "<br>";
		echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn-lg btn-success \"onclick = \"javascrtpt:window.location.href='/new/find.php'\">return</button>";
	}

	else {
function str_rand($length = 6, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {	//生成随机数字符串
	if(!is_int($length) || $length < 0) {
		return false;
	}
	$string = '';
	for($i = $length; $i > 0; $i--) {
		$string .= $char[mt_rand(0, strlen($char) - 1)];
	}
	return $string;
}
$sj=str_rand();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1 style=\"margin-left:430\">Piracy Steam密码已重置\n可以使用密码'$sj'来登录你的账号<h1>";
$m=md5($sj);
mysqli_query($con,"update user set password='$m' where username='$name';");
echo "<br>";
echo "<br>";
echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn-lg btn-success \"onclick = \"javascrtpt:window.location.href='/new/find.php'\">return</button>";
}
?>