<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Theme Template for Bootstrap</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
		function display_alert()
		{
			if(confirm("Decide to quit?"))
			{
				location.href="/new/login.php";
			}
		}
	</script>

	<style type="text/css">
	p{
		text-indent: 2em;
	}

	#aa{
		display:block;
		position:relative;
		margin:auto;
		width:1280px;
		height:720px;
	}
</style>
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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					require "conn.php";
					if(isset($_COOKIE['a'])==0){
						echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
					}
					$w=$_COOKIE['a'];
					$user_sql="select * from user where user_id='$w'";
					$user_result=mysqli_query($con,$user_sql);
					$user_arr=mysqli_fetch_row($user_result);
					?>
					<li><a onclick =javascrtpt:window.location.href="/new/kfs.php"><?php echo $user_arr[1].'(开发商)'?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<br><br><br><br><br><br><br><br>
	<br><br><br><br>
	<div class="container theme-showcase" role="main">
		<form action="pub.php" method="post" class="form-signin" enctype="multipart/form-data">
			<input style="width:500px;margin-left:20px" maxlength='20' class="form-control" type="text" name="name" placeholder="Enter your game name:"/></br>
			<input style="width:500px;margin-left:20px" maxlength='20' class="form-control"type="text" name="price" placeholder="Enter the price:"/></br>
			<p style="margin-left : 30;margin-top:5"class="help-block">你的封面图片文件</p>
			<input style="margin-left:30;margin-top:5" type="file" name="cover"/>
			<p class="help-block" style="margin-left:30;margin-top:5" >你的介绍图片文件</p>
			<input style="margin-left : 30;margin-top:5" type="file" name="pic"/>
			<br>
			<textarea style="width:500px;margin-left:20px" class="form-control" rows="5" name="intro" placeholder="游戏简介"></textarea><br>
			<?php
			mysqli_query($con,'SET NAMES UTF8');
			$label_sql="SELECT * from label_id";
			$label_q=mysqli_query($con,$label_sql);
			if($label_q&&is_object($label_q)){
				while($label_suibian=mysqli_fetch_row($label_q)){                 													
					$label_result[]=$label_suibian;
				}
			} 
			echo "<select class=\"form-control\"style=\"width:200px;margin-left:20px\" name =\"what\">";
			for($i=0;$i<count($label_result);$i++){
				$num=$label_result[$i][0];
				$name=$label_result[$i][1];
				echo "<option value=$num>$name</option>";
			}
			echo "</select></br>";
			?>
			<button style="margin-left:20px;margin-top:20px" type="submit" class="btn btn-success">提交</button>		
			<button style="margin-left:20px;margin-top:20px" type="button" class="btn btn-info" onclick = "javascrtpt:window.location.href='/new/kfs.php'">返回</button>		
		</form>

