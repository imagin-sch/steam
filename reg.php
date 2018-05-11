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
	$password=$_POST['pw'];
	$pw=$_POST['com_pw'];
	$mail=$_POST['mail'];
	$t_pw=md5($password);
	$result=mysqli_query($con,"select * from user where username = '$name' ");
	$a=mysqli_fetch_row($result);		
	$j_m=mysqli_fetch_row(mysqli_query($con,"select * from user where mail = '$mail' "));
if ($pw!=$password){									//两次密码不一致
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:720\">两次密码不一致，重新输入</h1>";			
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/register.php'\">return</button>";
}
else if($a){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:750\">用户名已存在，重新输入</h1>";			
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/register.php'\">return</button>";
}
else if($j_m){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:750\">该邮箱已注册，重新输入</h1>";			
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/register.php'\">return</button>";
}


else if(strlen($pw)<6){
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:750\">密码难度过低，至少六位</h1>";			
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/register.php'\">return</button>";
}
else {
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$query="insert into user value(default,'$name',md5('$pw'),'$mail',default,default)";
	$result=mysqli_query($con,$query);
	echo "<h1 style=\"margin-left:860\">注册成功</h1>";
	echo "<br>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20\" type=\"button\" class=\"btn btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/register.php'\">return</button>";
}
?>