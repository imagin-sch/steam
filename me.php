<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Theme Template for Bootstrap</title>
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
// print_r("<pre>");
// print_r($user_arr);
// print_r("</pre>");
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
					<li><a href="/new/first.php">主页</a></li>
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
					<li class="active"><a onclick =javascrtpt:window.location.href="/new/me.php"><?php echo '欢迎，'.$user_arr[1].' 余额：'.$user_arr[4]?></a></li>
				</ul>
			</div>
		</div>
	</nav>

</br></br>
<div class="container theme-showcase" role="main">
	<h1 style="text-indent: 0em;text-align:center"><?php echo "Welcome , ".$user_arr[1]?></h1>
</br></br></br></br></br></br>
<button  style="margin-left:230px" type="button" class="btn btn-lg btn-info"onclick = "javascrtpt:window.location.href='/new/library.php'">查看我的游戏库</button>
<button  style="margin-left:400px" type="button" class="btn btn-lg btn-success"onclick = "javascrtpt:window.location.href='/new/charge.php'">充值</button>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php
$play_sql="select play.game_id,game.game_name,play.enter_time,play.quit_time,cover.cover_addr from play inner join game on play.game_id=game.game_id inner join cover on cover.game_id=game.game_id where user_id = '$user_arr[0]' order by play.enter_time DESC limit 3";
$play_result=mysqli_query($con,$play_sql);
// $play_arr=mysqli_fetch_row($play_result);
$play_arr[]="";
if($play_result && is_object($play_result)){
	while($play_temp=mysqli_fetch_row($play_result)){					
		$play_arr[]=$play_temp;
	}
}
// print_r("<pre>"); print_r($play_arr);echo count($play_arr);
// print_r("</pre>");
echo "<h2 style=\"text-indent: 3em;\">最近玩过：</h2>";

if(!$play_arr){
	if(count($play_arr)==1){
		$p1=$play_arr[0][4];
		$p1_name=$play_arr[0][1];
		$p1_quit_time=$play_arr[0][3];
		
		echo  "</br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p1_quit_time</h3></div></div>";
	}
	
	if(count($play_arr)==2){
		$p1=$play_arr[0][4];
		$p2=$play_arr[1][4];
		$p1_name=$play_arr[0][1];
		$p1_quit_time=$play_arr[0][3];
		$p2_name=$play_arr[1][1];
		$p2_quit_time=$play_arr[1][3];
		echo  "</br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p1_quit_time</h3></div></div>";
		
		echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p2 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p2_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p2_quit_time</h3></div></div>";
	}
	if(count($play_arr)>2){
		$p1=$play_arr[0][4];
		$p2=$play_arr[1][4];
		$p3=$play_arr[2][4];
		$p1_name=$play_arr[0][1];
		$p1_quit_time=$play_arr[0][3];
		$p2_name=$play_arr[1][1];
		$p2_quit_time=$play_arr[1][3];		
		$p3_name=$play_arr[2][1];
		$p3_quit_time=$play_arr[2][3];
		echo  "</br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p1 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p1_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p1_quit_time</h3></div></div>";
		
		echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p2 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p2_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p2_quit_time</h3></div></div>";
		
		echo  "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
		echo "<div style =\"position:absolute;float:left;height:250;width:1000;\" >";
		echo "<div style=\" position: relative;float:left;height:250;width:500\"><img src=$p3 height=\"240\" width=\"425\"/></div>";
		echo "<div style=\" position: relative;float:left;margin-top:30px;text-indent: 3em;\">	<h2 style=\"text-indent:0em;\">$p3_name<br><br></h2><h3 style=\"text-indent:0em;\">上次退出时间$p3_quit_time</h3></div></div>";
	}
	
}
else 
	echo "<h3><p style=\"margin-left:50;margin-top:20\">好像你还没玩过游戏</h3></p>";

?>





<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>









<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>


