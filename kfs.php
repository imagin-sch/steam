<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>开发商</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	.game{
		position: relative;
		z-index: 0;

	}
	.game:hover{				
		z-index: 50;
	}
	.game span{							/*客体背景*/
		position:absolute;
		background-color:#ffffff;
		// padding: 2px;
		height:533;
		width:535;
		visibility: hidden;
		color: black;
		text-decoration: none;
	}

	.game p{							/*客体背景*/
		position:absolute;
		background-color:#ffffff;
		// padding: 2px;
		height:533;
		width:535;
		visibility: hidden;
		color: black;
		text-decoration: none;
	}


	.game:hover img{
		border:1px #ffd700 solid;

	}
	.game span img{			/*客体背景里的图片*/
		border-width: 0;

	}
	.game:hover span{		/*客体位置*/
		visibility: visible;
		border:1px #000000 solid;
		top: -200px;
		left: 250; 
	}
	.game:hover p{		/*客体位置*/
		visibility: visible;
		text-indent:0em;
		border:1px #000000 solid;
		top: -200px;
		right: 250; 

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
					<li class="active"><a href="/new/kfs.php">主页</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					require 'conn.php';
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
	
	<br><br><br><br><br><button  style="margin-left:1500" type="button" class="btn btn-lg btn-default"onclick = "javascrtpt:window.location.href='/new/publish.php'">发布新游戏</button>	
	<h2 style="text-indent:2em;">买的最火的游戏：</h2>
	<?php
	mysqli_query($con,'SET NAMES UTF8');    
	$sb_sql="select library.game_id,count(library.user_id),sum(library.buy_price) from library inner join game on game.game_id=library.game_id where ATLUS = '$w' group by game_id order by sum(buy_price) desc limit 3 ";
	$sb_q=mysqli_query($con,$sb_sql);
	if($sb_q && is_object($sb_q)){
		while($suibian=mysqli_fetch_row($sb_q)){					
			$sb_jg1[]=$suibian;
		}
	}
	$g1=$sb_jg1[0][0];
	$g2=$sb_jg1[1][0];
	$g3=$sb_jg1[2][0];
	$sb_sql="SELECT game.*,cover.cover_addr,picture.addr,group_concat(label_id.name) from label inner join cover on cover.game_id=label.game_id inner join picture on picture.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id inner join game on game.game_id=label.game_id where game.game_id='$g1' or game.game_id='$g2' or game.game_id='$g3' group by game.game_id";
	$sb_q1=mysqli_query($con,$sb_sql);
	if($sb_q1 && is_object($sb_q1)){
		while($suibia=mysqli_fetch_row($sb_q1)){					
			$sb_jg[]=$suibia;
		}
	}
 // print_r("<pre>");
  // print_r($sb_jg);
	?>
	<br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >					<!--三小-->

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$sb_jg[0][0]?>"><img src=<?php echo $sb_jg[0][6]?> height="240" width="425"/></a>
			<span><?php echo $sb_jg[0][1]?><img src=<?php echo $sb_jg[0][7]?> width="533" height="300" /><?php echo $sb_jg[0][4]."<br>原价：".$sb_jg[0][2]."<br>"."现价：".$sb_jg[0][2]*$sb_jg[0][3]."<br>该游戏标签：".$sb_jg[0][8]."<br>卖出去".$sb_jg1[0][1]."份<br>利润：".$sb_jg1[0][2]?>
			</span>
		</div>

		<div style ="position:relative;float:left;"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$sb_jg[0][0]?>"><img src=<?php echo $sb_jg[1][6]?> width="425" height="240" /></a>
			<p><?php echo $sb_jg[1][1]?><img src=<?php echo $sb_jg[1][7]?> width="533" height="300" /><?php echo $sb_jg[1][4]."<br>原价：".$sb_jg[1][2]."<br>"."现价：".$sb_jg[1][2]*$sb_jg[1][3]."<br>该游戏标签：".$sb_jg[1][8]."<br>卖出去".$sb_jg1[1][1]."份<br>利润：".$sb_jg1[1][2]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$sb_jg[0][0]?>"><img src=<?php echo $sb_jg[2][6]?> height="239" width="425" /></a>
			<span><?php echo $sb_jg[2][1]?><img src=<?php echo $sb_jg[2][7]?> width="533" height="300" /><?php echo $sb_jg[2][4]."<br>原价：".$sb_jg[2][2]."<br>"."现价：".$sb_jg[2][2]*$sb_jg[2][3]."<br>该游戏标签：".$sb_jg[2][8]."<br>卖出去".$sb_jg1[2][1]."份<br>利润：".$sb_jg1[2][2]?>
			</span>
		</div>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<h2 style="text-indent:2em;">我发布的所有游戏：</h2>

	<?php
//查询我发布的游戏，进入游戏界面
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");                           创建写新文件
	$count=0;


	$count_true=$count*9;
	$my_publish_sql="select game.game_name,game.price,game.discount,game.introduction,cover.cover_addr,picture.addr,game.game_id from game inner join picture on picture.game_id=game.game_id inner join cover on cover.game_id=picture.game_id where game.ATLUS = '$w' order by rand() limit 9";
	$my_pub_q=mysqli_query($con,$my_publish_sql);
	if($my_pub_q && is_object($my_pub_q)){
		while($my_pub_s=mysqli_fetch_row($my_pub_q)){					
			$my_pub_arr[]=$my_pub_s;
		}
	}
	?>

	<br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[0][6]?>"><img src=<?php echo $my_pub_arr[0][4]?> height="240" width="425"/></a>
			<span><?php echo $my_pub_arr[0][0]?><img src=<?php echo $my_pub_arr[0][5]?> width="533" height="300" /><?php echo $my_pub_arr[0][3]."<br>原价：".$my_pub_arr[0][1]."<br>"."现价：".$my_pub_arr[0][1]*$my_pub_arr[0][2]?>
			</span>
		</div>

		<div style ="position:relative;float:left;"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[1][6]?>"><img src=<?php echo $my_pub_arr[1][4]?> width="425" height="240" /></a>
			<p><?php echo $my_pub_arr[1][0]?><img src=<?php echo $my_pub_arr[1][5]?> width="533" height="300" /><?php echo $my_pub_arr[1][3]."<br>原价：".$my_pub_arr[1][1]."<br>"."现价：".$my_pub_arr[1][2]*$my_pub_arr[1][2]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[2][6]?>"><img src=<?php echo $my_pub_arr[2][4]?> height="239" width="425" /></a>
			<span><?php echo $my_pub_arr[2][0]?><img src=<?php echo $my_pub_arr[2][5]?> width="533" height="300" /><?php echo $my_pub_arr[2][3]."<br>原价：".$my_pub_arr[2][1]."<br>"."现价：".$my_pub_arr[2][1]*$my_pub_arr[2][2]?>
			</span>
		</div>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[3][6]?>"><img src=<?php echo $my_pub_arr[3][4]?> height="240" width="425"/></a>
			<span><?php echo $my_pub_arr[3][0]?><img src=<?php echo $my_pub_arr[3][5]?> width="533" height="300" /><?php echo $my_pub_arr[3][3]."<br>原价：".$my_pub_arr[3][1]."<br>"."现价：".$my_pub_arr[3][1]*$my_pub_arr[3][2]?>
			</span>
		</div>

		<div style ="position:relative;float:left;"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[4][6]?>"><img src=<?php echo $my_pub_arr[4][4]?> width="425" height="240" /></a>
			<p><?php echo $my_pub_arr[4][0]?><img src=<?php echo $my_pub_arr[4][5]?> width="533" height="300" /><?php echo $my_pub_arr[4][3]."<br>原价：".$my_pub_arr[4][1]."<br>"."现价：".$my_pub_arr[4][2]*$my_pub_arr[4][2]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[5][6]?>"><img src=<?php echo $my_pub_arr[5][4]?> height="239" width="425" /></a>
			<span><?php echo $my_pub_arr[5][0]?><img src=<?php echo $my_pub_arr[5][5]?> width="533" height="300" /><?php echo $my_pub_arr[5][3]."<br>原价：".$my_pub_arr[5][1]."<br>"."现价：".$my_pub_arr[5][1]*$my_pub_arr[5][2]?>
			</span>
		</div>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[6][6]?>"><img src=<?php echo $my_pub_arr[6][4]?> height="240" width="425"/></a>
			<span><?php echo $my_pub_arr[6][0]?><img src=<?php echo $my_pub_arr[6][5]?> width="533" height="300" /><?php echo $my_pub_arr[6][3]."<br>原价：".$my_pub_arr[6][1]."<br>"."现价：".$my_pub_arr[6][1]*$my_pub_arr[6][2]?>
			</span>
		</div>

		<div style ="position:relative;float:left;"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[7][6]?>"><img src=<?php echo $my_pub_arr[7][4]?> width="425" height="240" /></a>
			<p><?php echo $my_pub_arr[7][0]?><img src=<?php echo $my_pub_arr[7][5]?> width="533" height="300" /><?php echo $my_pub_arr[7][3]."<br>原价：".$my_pub_arr[7][1]."<br>"."现价：".$my_pub_arr[7][2]*$my_pub_arr[7][2]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_kfs.php?game_id=".$my_pub_arr[8][6]?>"><img src=<?php echo $my_pub_arr[8][4]?> height="239" width="425" /></a>
			<span><?php echo $my_pub_arr[8][0]?><img src=<?php echo $my_pub_arr[8][5]?> width="533" height="300" /><?php echo $my_pub_arr[8][3]."<br>原价：".$my_pub_arr[8][1]."<br>"."现价：".$my_pub_arr[8][1]*$my_pub_arr[8][2]?>
			</span>
		</div>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	
	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>