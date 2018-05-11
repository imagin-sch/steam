<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>主页(管理员)</title>
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
					<li class="active"><a href="/new/first_gly.php">主页</a></li>
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
					<li><a onclick =javascrtpt:window.location.href="/new/first_gly.php"><?php echo $user_arr[1].'(管理员)'?></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
	mysqli_query($con,'SET NAMES UTF8'); 
	$sb_sql="SELECT game.*,cover.cover_addr,picture.addr,group_concat(label_id.name) from label inner join cover on cover.game_id=label.game_id inner join game on game.game_id=label.game_id inner join picture on picture.game_id=game.game_id inner join label_id on label.label_id=label_id.label_id group by game.game_id order by rand() limit 12";
	$sb_q=mysqli_query($con,$sb_sql);
	if($sb_q && is_object($sb_q)){
		while($suibian=mysqli_fetch_row($sb_q)){                    
			$sb_jg[]=$suibian;
		}
	}
	?>
	<br><br><br><br><br><br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >                 <!--三小-->
		<div style ="position:relative;float:right;"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[6][0]?>"><img src=<?php echo $sb_jg[6][6]?> width="425" height="240" /></a>
			<p><?php echo $sb_jg[6][1]?><img src=<?php echo $sb_jg[6][7]?> width="533" height="300" /><?php echo $sb_jg[6][4]."<br>原价：".$sb_jg[6][2]."<br>"."现价：".$sb_jg[6][2]*$sb_jg[6][3]."<br>该游戏标签：".$sb_jg[6][8]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[7][0]?>"><img src=<?php echo $sb_jg[7][6]?> height="239" width="425" /></a>
			<span><?php echo $sb_jg[7][1]?><img src=<?php echo $sb_jg[7][7]?> width="533" height="300" /><?php echo $sb_jg[7][4]."<br>原价：".$sb_jg[7][2]."<br>"."现价：".$sb_jg[7][2]*$sb_jg[7][3]."<br>该游戏标签：".$sb_jg[7][8]?>
			</span>
		</div>

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[8][0]?>"><img src=<?php echo $sb_jg[8][6]?> height="240" width="425"/></a>
			<span><?php echo $sb_jg[8][1]?><img src=<?php echo $sb_jg[8][7]?> width="533" height="300" /><?php echo $sb_jg[8][4]."<br>原价：".$sb_jg[8][2]."<br>"."现价：".$sb_jg[8][2]*$sb_jg[8][3]."<br>该游戏标签：".$sb_jg[8][8]?>
			</span>
		</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br>

	<div style="margin-left:311px;position:absolute;height:480px;width:1280px;background-color:black" >                 <!--右大左小-->
		<div style ="position:relative;float:right;"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[0][0]?>"><img src=<?php echo $sb_jg[0][6]?> width="852" height="480" /></a>
			<p><?php echo $sb_jg[0][1]?><img src=<?php echo $sb_jg[0][7]?> width="533" height="300" /><?php echo $sb_jg[0][4]."<br>原价：".$sb_jg[0][2]."<br>"."现价：".$sb_jg[0][2]*$sb_jg[0][3]."<br>该游戏标签：".$sb_jg[0][8]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[1][0]?>"><img src=<?php echo $sb_jg[1][6]?> height="239" width="425" /></a>
			<span><?php echo $sb_jg[1][1]?><img src=<?php echo $sb_jg[1][7]?> width="533" height="300" /><?php echo $sb_jg[1][4]."<br>原价：".$sb_jg[1][2]."<br>"."现价：".$sb_jg[1][2]*$sb_jg[1][3]."<br>该游戏标签：".$sb_jg[1][8]?>
			</span>
		</div>

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[2][0]?>"><img src=<?php echo $sb_jg[2][6]?> height="240" width="425"/></a>
			<span><?php echo $sb_jg[2][1]?><img src=<?php echo $sb_jg[2][7]?> width="533" height="300" /><?php echo $sb_jg[2][4]."<br>原价：".$sb_jg[2][2]."<br>"."现价：".$sb_jg[2][2]*$sb_jg[2][3]."<br>该游戏标签：".$sb_jg[2][8]?>
			</span>
		</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br>

	<div style="margin-left:311px;position:absolute;height:480px;width:1280px;background-color:black" >                 <!--左大右小-->
		<div style ="position:relative;float:left;"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[3][0]?>"><img src=<?php echo $sb_jg[3][6]?> width="852" height="480" /></a>
			<p><?php echo $sb_jg[3][1]?><img src=<?php echo $sb_jg[3][7]?> width="533" height="300" /><?php echo $sb_jg[3][4]."<br>原价：".$sb_jg[3][2]."<br>"."现价：".$sb_jg[3][2]*$sb_jg[3][3]."<br>该游戏标签：".$sb_jg[3][8]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[4][0]?>"><img src=<?php echo $sb_jg[4][6]?> height="239" width="425" /></a>
			<p><?php echo $sb_jg[4][1]?><img src=<?php echo $sb_jg[4][7]?> width="533" height="300" /><?php echo $sb_jg[4][4]."<br>原价：".$sb_jg[4][2]."<br>"."现价：".$sb_jg[4][2]*$sb_jg[4][3]."<br>该游戏标签：".$sb_jg[4][8]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[5][0]?>"><img src=<?php echo $sb_jg[5][6]?> height="240" width="425"/></a>
			<p><?php echo $sb_jg[5][1]?><img src=<?php echo $sb_jg[5][7]?> width="533" height="300" /><?php echo $sb_jg[5][4]."<br>原价：".$sb_jg[5][2]."<br>"."现价：".$sb_jg[5][2]*$sb_jg[5][3]."<br>该游戏标签：".$sb_jg[5][8]?>
			</p>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br>
	<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >                 <!--三小-->
		<div style ="position:relative;float:right;"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[9][0]?>"><img src=<?php echo $sb_jg[9][6]?> width="425" height="240" /></a>
			<p><?php echo $sb_jg[9][1]?><img src=<?php echo $sb_jg[9][7]?> width="533" height="300" /><?php echo $sb_jg[9][4]."<br>原价：".$sb_jg[9][2]."<br>"."现价：".$sb_jg[9][2]*$sb_jg[9][3]."<br>该游戏标签：".$sb_jg[9][8]?>
			</p>
		</div>

		<div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[10][0]?>"><img src=<?php echo $sb_jg[10][6]?> height="239" width="425" /></a>
			<span><?php echo $sb_jg[10][1]?><img src=<?php echo $sb_jg[10][7]?> width="533" height="300" /><?php echo $sb_jg[10][4]."<br>原价：".$sb_jg[10][2]."<br>"."现价：".$sb_jg[10][2]*$sb_jg[10][3]."<br>该游戏标签：".$sb_jg[10][8]?>
			</span>
		</div>

		<div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
			<a href="<?php echo "/new/game_gly.php?game_id=".$sb_jg[11][0]?>"><img src=<?php echo $sb_jg[11][6]?> height="240" width="425"/></a>
			<span><?php echo $sb_jg[11][1]?><img src=<?php echo $sb_jg[11][7]?> width="533" height="300" /><?php echo $sb_jg[11][4]."<br>原价：".$sb_jg[11][2]."<br>"."现价：".$sb_jg[11][2]*$sb_jg[11][3]."<br>该游戏标签：".$sb_jg[11][8]?>
			</span>
		</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br>

	<button style="margin-left:507" type="button" class="btn btn-lg btn-primary"onclick = "javascrtpt:window.location.href='/new/change.php'">更改首页推荐
	</button>
	<button style="margin-left:590" type="button" class="btn btn-lg btn-danger"onclick = "javascrtpt:window.location.href='/new/fenghao.php'">来封号呀
	</button>
	<br><br><br><br><br>

	
</body>