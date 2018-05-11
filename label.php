<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Piracy Steam</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

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
					<li><a href="/new/library.php">库</a></li>
					<li><a href="/new/first.php">社区</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					require 'conn.php';
					if(isset($_COOKIE['a'])==0){
						echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
					}
					$w=$_COOKIE['a'];
					$game_id=$_GET['game_id'];
					$user_sql="select * from user where user_id='$w'";
					$user_result=mysqli_query($con,$user_sql);
					$user_arr=mysqli_fetch_row($user_result);
					?>
					<li><a onclick =javascrtpt:window.location.href="/new/kfs.php"><?php echo $user_arr[1].'(开发商)'?></a></li>
				</ul>
			</div>
		</div>
	</nav>


	<br><br><br><br><br><br><br><br><br>

	<?php

	mysqli_query($con,'SET NAMES UTF8');
	$label_sql="SELECT * from label_id";
	$label_q=mysqli_query($con,$label_sql);
	if($label_q&&is_object($label_q)){
		while($label_suibian=mysqli_fetch_row($label_q)){                 													
			$label_result[]=$label_suibian;
		}
	} 
	echo "<form action=\"label_i.php?game_id=$game_id\" method=\"post\" style=\"margin-left:230;\">";	
	echo "<select class=\"form-control\"style=\"width:200px;margin-left:20px\" name =\"id\">";
	for($i=0;$i<count($label_result);$i++){
		$num=$label_result[$i][0];
		$name=$label_result[$i][1];
		echo "<option value=$num>$name</option>";
	}
	echo "</select>";
	echo "<button type=\"submit\" class=\"btn btn-default\" style=\"margin-left:30;margin-top:30\">提交</button>";
	echo "<button style=\"margin-left:30;margin-top:30\" type=\"button\" class=\"btn btn-default\" onclick = \"javascrtpt:window.location.href='/new/game_kfs.php?game_id=$game_id'\">返回</button>";
	echo "</from>"
	?>
