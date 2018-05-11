<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Piracy Steam</title>
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
					<li><a onclick =javascrtpt:window.location.href="/new/kfs.php"><?php echo $user_arr[1].'(管理员)'?></a></li>
				</ul>
			</div>
		</div>
	</nav>



	<?php
/*
game要干的几件事情
游戏的各种信息
用户可以购买，开发商可以降价，下架，加标签
评论										//并没有评论了
管理员可以删除评论
*/


echo "<br>";
mysqli_query($con,'SET NAMES UTF8');
$game_info_sql="select game.*,cover.cover_addr,picture.addr,label.label_id from game inner join cover on cover.game_id=game.game_id inner join picture on picture.game_id=game.game_id inner join label on label.game_id=game.game_id inner join label_id on label_id.label_id=label.label_id where game.game_id='$game_id'";
$game_info_q=mysqli_query($con,$game_info_sql);
// $game_info_result=mysqli_fetch_assoc($game_info_q);
if($game_info_q && is_object($game_info_q)){
	while($game_info_suibian=mysqli_fetch_assoc($game_info_q)){                 //必须有个变量，否则只有一行数据
		$game_info_result[]=$game_info_suibian;
	}
} 
/*echo "<pre>";
print_r($game_info_result);
echo count($game_info_result);
echo "</pre>";*/

for ($i=0;$i<count($game_info_result);$i++){
	$label_id=$game_info_result[$i]['label_id'];
	$game_label_sql="select label_id.name from label_id where label_id='$label_id'";
	$game_label_q=mysqli_query($con,$game_label_sql);
	if($game_label_q && is_object($game_label_q)){
		while($game_label_suibian=mysqli_fetch_row($game_label_q)){                 													
			$game_label_result[]=$game_label_suibian;
		}
	} 
}



	/*echo "<pre>";
	print_r($game_label_result);
	echo "</pre>";*/
	?>
	<div class="page-header">
	</br></br>
	<h1><p><?php echo $game_info_result[0]['game_name']?> 简介：</p></h1>
</div>

<div id="carousel-example-generic" class="carousel slide">
	<ol class="carousel-indicators" >
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src=<?php echo $game_info_result[0]['addr']?> alt="First slide" id="aa">
		</div>
		<div class="item">
			<img src=<?php echo $game_info_result[0]['cover_addr']?> alt="Second slide" id="aa">
		</div>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
</div> 
<br>
<div class="page-header">
</br></br>
<h3><p>原价：<?php echo $game_info_result[0]['price']?> </p>
	<p>现价：<?php echo $game_info_result[0]['discount']*$game_info_result[0]['price']?>     (-<?php echo (1-$game_info_result[0]['discount'])*100?>%)</p>
	<p>游戏标签：</p>
	<p>游戏简介：<?php 
	for($a=0;$a<count($game_label_result);$a++)
		echo "\"".$game_label_result[$a][0]."\""." ";
	?></p>
	<p><?php echo $game_info_result[0]['introduction']?></p>
</h3>
</div>
<button style="margin-left:90;margin-top:20" type="button" class="btn btn-danger" onclick="javascrtpt:window.location.href='/new/qz.php?game_id=<?php echo $game_id?>'">强制下架</button>


<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
