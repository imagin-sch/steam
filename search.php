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
					<li><a onclick="display_alert()"">社区</a></li>
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
	$name=$_POST['name'];
	$password=$_POST['pw'];
	$t_pw=md5($password);
	$result=mysqli_query($con,"select password,user_id,authrity from user where username = '$name' ");
if (!$result) {								//boolean solution
	printf("Error: %s\n", mysqli_error($con));
	exit();
}





$a=mysqli_fetch_row($result);
if(!$a){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:860\">请先注册</h1>";			//没有这个用户
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/login.php'\">return</button>";
}
else if($t_pw==$a[0]){						//密码正确
	setcookie("a",$a[1]);
	if($a[2]==0)
	Header("Location: first.php"); 		//普通用户
if($a[2]==1)
	Header("Location: kfs.php"); 		//开发商
if($a[2]==2)
	Header("Location: first_gly.php");		//管理员
	// if($a[2]==9)
	// Header("Location: cj_gly.php");		//超级管理员  太难 以后有时间实现
}	
else if($t_pw!=$a[0]){																//密码不正确
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:770\">登陆失败，密码错误</h1>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/login.php'\">return</button>";
	
} 														


?>