<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>你的库存</title>
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
		if(confirm("Decide to quit?"))
		{
			location.href="/new/login.php";
		}
	}
</script>

</head>
<body>
	<br><br><br><br><br><br><br>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">             
				<a class="navbar-brand"  onclick="display_alert()">Steam</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="/new/first.php">主页</a></li>
					<li class="active"><a href="/new/library.php">库</a></li>
					<li><a href="/new/first.php">社区</a></li>
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
					<li><a onclick =javascrtpt:window.location.href="/new/me.php"><?php echo '欢迎，'.$user_arr[1].' 余额：'.$user_arr[4]?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container theme-showcase" role="main">
		<?php
		mysqli_query($con,'SET NAMES UTF8');    
		$play_sql="select library.game_id,game.game_name,library.info_id,library.buy_time,cover.cover_addr from library inner join game on library.game_id=game.game_id inner join cover on cover.game_id=game.game_id where user_id = '$w' order by rand()";
		$play_result=mysqli_query($con,$play_sql);
		$play_arr[]="";
		if($play_result && is_object($play_result)){
			while($play_temp=mysqli_fetch_row($play_result)){					
				$play_arr[]=$play_temp;
			}
		}
		echo "<h2 style=\"text-indent: 3em;\">我的游戏库：</h2>";
		if($play_arr){
			if(count($play_arr)==2){
				$p1=$play_arr[1][4];
				$p1_name=$play_arr[1][1];
				$p1_quit_time=$play_arr[1][3];
				
				echo  "</br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p1_quit_time</h3></div></div>";
			}
			
			if(count($play_arr)==3){
				$p1=$play_arr[1][4];
				$p2=$play_arr[2][4];
				$p1_name=$play_arr[1][1];
				$p1_quit_time=$play_arr[1][3];
				$p2_name=$play_arr[2][1];
				$p2_quit_time=$play_arr[2][3];
				echo  "</br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p1_quit_time</h3></div></div>";
				
				echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p2 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p2_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p2_quit_time</h3></div></div>";
			}
			if(count($play_arr)>3){
				$p1=$play_arr[1][4];
				$p2=$play_arr[2][4];
				$p3=$play_arr[3][4];
				$p1_name=$play_arr[1][1];
				$p1_quit_time=$play_arr[1][3];
				$p2_name=$play_arr[2][1];
				$p2_quit_time=$play_arr[2][3];		
				$p3_name=$play_arr[3][1];
				$p3_quit_time=$play_arr[3][3];
				echo  "</br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p1_quit_time</h3></div></div>";
				
				echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p2 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p2_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p2_quit_time</h3></div></div>";
				
				echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
				echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
				echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p3 height=\"240\" width=\"425\"/></div>";
				echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p3_name<br><br></h2><h3 style=\"text-indent:0em;\">购买时间：$p3_quit_time</h3></div></div>";
			}
			
		}
		else 
			echo "<h3><p style=\"margin-left:50\">好像你还没买过游戏</p></h3>";

		?>
	</div>
</body>
</html>