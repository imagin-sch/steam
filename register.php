<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>注册</title>
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
	<div class="container theme-showcase" role="main">
		<br><br>
		<div class="jumbotron">
			<h1>Register Now</h1>
			<p>Sorry, I don't konw what should I say......</p>
		</div>
		<form action="reg.php" method="post" class="form-signin">
			<input style="width:500px;margin-left:20px" maxlength='10' class="form-control" type="text" name="username" placeholder="Enter your name:"/></br>
			<input style="width:500px;margin-left:20px" maxlength='20' class="form-control"type="text" name="mail" placeholder="Enter your mail:"/></br>
			<input style="width:500px;margin-left:20px" maxlength='10' class="form-control" type="password" name="pw" placeholder="Enter your password:"/></br>
			<input style="width:500px;margin-left:20px" maxlength='10' class="form-control"type="password" name="com_pw" placeholder="Comfirm your password:"/></br>
			<button style="margin-left:20px;margin-top:20px" type="submit" class="btn btn-success">Submit</button>		
			<button style="margin-left:20px;margin-top:20px" type="button" class="btn btn-info" onclick = "javascrtpt:window.location.href='/new/login.php'">Return</button>		
		</form>


		
		<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
	</html>
