<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
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
		<div class="jumbotron">
		</br></br>
		<h1>Piracy Steam</h1>
		<p>Welcome to the Piracy Steam,you can do anything you want here.But please do not tell this network to the TRUE STEAM.</p>
	</div>

	
	
	
	<div class="container">
		<form class="form-signin" action="/new/search.php" method="post">
		</br>
		<h1 class="form-signin-heading" >请登录：</h1>
		<input style="width:500px" class="form-control" type="text" name="name" placeholder="UserName" required>
		<input style="width:500px" class="form-control" type="password" name="pw"  placeholder="password" required>
	</br>
	<button style="margin-top:20;" type="submit" class="btn btn-primary"  >登录</button>
	<button  style="margin-left:10px;margin-top:20;" type="button" class="btn btn-success "onclick = "javascrtpt:window.location.href='/new/register.php'">注册</button>
	<button  style="margin-left:10px;margin-top:20;" type="button" class="btn btn-warning"onclick = "javascrtpt:window.location.href='/new/find.php'">忘记密码？</button>
	<br><br><br>
</form>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
