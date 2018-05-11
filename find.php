<script type="text/javascript">
	function display_alert()
	{
		alert("please login first");
	}
</script>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

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
	<div class="container theme-showcase" role="main">
		<br><br>
		<div class="jumbotron">
			<h1>Reset your password</h1>
			<p>填写你的邮箱和用户名，系统会将你的新密码以邮件形式发送</p>
		</div>
		<form action="findpw.php" method="post" class="form-signin">
			<input style="width:500px;margin-left:20px" maxlength='10' class="form-control" type="text" name="username" placeholder="Enter your name:"/></br>
			<input style="width:500px;margin-left:20px" maxlength='20' class="form-control" type="text" name="mail" placeholder="Enter your mail:"/></br>
			<button style="margin-left:20px;margin-top:20px" type="submit" class="btn btn btn-success">提交</button>		
			<button style="margin-left:20px;margin-top:20px" type="button" class="btn btn btn-info" onclick = "javascrtpt:window.location.href='/new/login.php'">返回</button>
			<button style="margin-left:20px;margin-top:20px" type="button" class="btn btn btn-warning" onclick = "javascrtpt:window.location.href='/new/findpw1.php'">可是我连邮箱都忘了</button>				 
		</form>
