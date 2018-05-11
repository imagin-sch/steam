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
					<li><a onclick =javascrtpt:window.location.href="/new/library.php"><?php echo '欢迎，'.$user_arr[1].' 余额：'.$user_arr[4]?></a></li>
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
if($game_info_q && is_object($game_info_q)){
	while($game_info_suibian=mysqli_fetch_assoc($game_info_q)){
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

<?php
$check_user_sql="SELECT * from library where user_id ='$w' and game_id='$game_id'";
$check_user_q=mysqli_query($con,$check_user_sql);
$check_user_result=mysqli_fetch_assoc($check_user_q);
if(count($check_user_result)==5){					//如果买过 就可以玩 没买过就显示现在购买
	echo "<button  style=\"margin-left:90;margin-top:20\" type=\"button\" class=\"btn btn-info \"onclick = \"javascrtpt:window.location.href='/new/".$game_info_result[0]['game_name'].".php'\">现在就玩</button>";
}
else {
	echo "<button  style=\"margin-left:90;margin-top:20\" type=\"button\" class=\"btn btn-warning \"onclick = \"javascrtpt:window.location.href='/new/order.php?game_id=$game_id'\">现在就买</button>";
}
?>


<!-- 				被雪藏的评论功能
<br><br><br>
<div class="page-header">
	<h1><p>精选评论：</p></h1>
</div>


<?php
$comment_sql="SELECT user.user_id,user.username,comment.comment,comment.info_id,sum(comment_fond.like_),sum(comment_fond.dislike) from comment inner join user on user.user_id=comment.user_id inner join comment_fond on comment_fond.comment_id=comment.info_id where game_id='$game_id' group by comment.info_id";
$comment_q=mysqli_query($con,$comment_sql);
if($comment_q && is_object($comment_q)){
		while($comment_suibian=mysqli_fetch_row($comment_q)){                 													
			$comment_result[]=$comment_suibian;
		}
	} 

	print_r($comment_result);

$comment_result_name1=$comment_result[0][1];
$comment_result_comment1=$comment_result[0][2];
$comment_result_like1=$comment_result[0][4];
$comment_result_dislike1=$comment_result[0][5];
echo "<div class=\"panel panel-primary\" style=\"margin-left:460;width:1000;\">";
echo "<div class=\"panel-heading\"><h3 class=\"panel-title\">$comment_result_name1</h3></div>";
echo "<div class=\"panel-body\">$comment_result_comment1";
echo "<br><br>";
echo "<button class=\"btn btn-success\" onclick=\"javascrtpt:window.location.href='/new/ajax/like.php?id=$game_id'\">赞同($comment_result_like1)</button>";
echo "<button class=\"btn btn-danger\" style=\"margin-left:20\" onclick=\"javascrtpt:window.location.href='/new/ajax/dislike.php'\">反对($comment_result_dislike1)</button></div></div>";



?>
-->

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
