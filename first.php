<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Steam</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
  .game{
    position: relative;
    z-index: 0;

  }
  .game:hover{                
    z-index: 50;
  }
  .game span{                         /*客体背景*/
    position:absolute;
    background-color:#ffffff;
    // padding: 2px;
    height:533;
    width:535;
    visibility: hidden;
    color: black;
    text-decoration: none;
  }

  .game p{                            /*客体背景*/
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
 .game span img{         /*客体背景里的图片*/
  border-width: 0;

}
.game:hover span{       /*客体位置*/
  visibility: visible;
  border:1px #000000 solid;
  top: -200px;
  left: 250; 
}
.game:hover p{
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
        $user_sql="select * from user where user_id='$w'";
        $user_result=mysqli_query($con,$user_sql);
        $user_arr=mysqli_fetch_row($user_result);
        ?>
        <li><a onclick =javascrtpt:window.location.href="/new/me.php"><?php echo '欢迎，'.$user_arr[1].' 余额：'.$user_arr[4]?></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="page-header">
</br></br>
<h1><p>店长推荐：</p></h1>
<form class="form-in" action="search_g.php" method="post">
  <div align="right" style="margin-right:200">
    <input style="width:300px"  type="text" name="search" class=" form-control"  placeholder="Search what you want" required>
  </div>
</div>

<?php
mysqli_query($con,'SET NAMES UTF8');    
$row=mysqli_fetch_assoc($result);


$w=$_COOKIE['a'];
$sq="SELECT label.label_id,SUM(library.buy_price),label_id.name FROM (library inner join label on label.game_id=library.game_id) inner join label_id on label.label_id=label_id.label_id WHERE library.user_id='$w' GROUP BY label.label_id";
$r=mysqli_query($con,$sq);
if (!$r) {                              
 printf("Error: %s\n", mysqli_error($con));
 exit();
}
$arr="";
if($r && is_object($r)){
	while($row=mysqli_fetch_assoc($r)){
		$arr[] = $row;
	}
}       

if(!$arr){  
  $sql_recommend="SELECT label.game_id,cover.cover_addr,picture.addr,game.game_name,game.price,game.discount,game.introduction,group_concat(label_id.name) FROM label inner join cover on label.game_id=cover.game_id inner join picture on picture.game_id=label.game_id inner join game on game.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id group by game.game_id ORDER BY RAND() limit 4";
  $recommend=mysqli_query($con,$sql_recommend);
  if($recommend && is_object($recommend)){
    while($bianliang=mysqli_fetch_row($recommend)){                 
      $rec[]=$bianliang;
    }
  }                                                                             //没买过游戏，随机推荐
  $tj1=$rec[0][1];
  $tj2=$rec[1][1];
  $tj3=$rec[2][1];
  $tj4=$rec[3][1];
}

else{                                                                                                                                           //推荐包含之前花费最多标签的游戏
	$label=$arr[0]['label_id'];
	$sql_recommend="SELECT label.game_id,cover.cover_addr,picture.addr,game.game_name,game.price,game.discount,game.introduction,group_concat(label_id.name) FROM label inner join cover on label.game_id=cover.game_id inner join picture on picture.game_id=label.game_id inner join game on game.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id where label.label_id='$label' group by game.game_id ORDER BY RAND() limit 4";
	$recommend=mysqli_query($con,$sql_recommend);
	if($recommend && is_object($recommend)){
		while($bianliang=mysqli_fetch_row($recommend)){                 //必须有个变量，否则只有一行数据
			$rec[]=$bianliang;
		}
	}       
	// print_r($rec);
	$tj1=$rec[0][1];
	$tj2=$rec[1][1];
	$tj3=$rec[2][1];
	$tj4=$rec[3][1];
}
/*$a="/img/civ6.jpg";
$b="/img/wow.jpg";
$c="/img/hos.jpg";*/

$roller1_sql="SELECT * from home where info='1'";
$roller1_q=mysqli_query($con,$roller1_sql);
$roller1_result=mysqli_fetch_row($roller1_q);
$roller1_id=$roller1_result[1];
$game1_sql="SELECT * FROM cover where game_id='$roller1_id'";
$cover1_q=mysqli_query($con,$game1_sql);
$cover1_res=mysqli_fetch_row($cover1_q);
$roller2_sql="SELECT * from home where info='2'";
$roller2_q=mysqli_query($con,$roller2_sql);
$roller2_result=mysqli_fetch_row($roller2_q);
$roller2_id=$roller2_result[1];
$game2_sql="SELECT * FROM cover where game_id='$roller2_id'";
$cover2_q=mysqli_query($con,$game2_sql);
$cover2_res=mysqli_fetch_row($cover2_q);
$roller3_sql="SELECT * from home where info='3'";
$roller3_q=mysqli_query($con,$roller3_sql);
$roller3_result=mysqli_fetch_row($roller3_q);
$roller3_id=$roller3_result[1];
$game3_sql="SELECT * FROM cover where game_id='$roller3_id'";
$cover3_q=mysqli_query($con,$game3_sql);
$cover3_res=mysqli_fetch_row($cover3_q);

?>


<div id="carousel-example-generic" class="carousel slide">
  <ol class="carousel-indicators" >
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     <a href="<?php echo "/new/game.php?game_id=".$roller1_id?>"><img src=<?php echo $cover1_res[1]?> alt="First slide" id="aa"></a>
   </div>
   <div class="item">
     <a href="<?php echo "/new/game.php?game_id=".$roller2_id?>"><img src=<?php echo $cover2_res[1]?> alt="Second slide" id="aa"></a>
   </div>
   <div class="item">
     <a href="<?php echo "/new/game.php?game_id=".$roller3_id?>"><img src=<?php echo $cover3_res[1]?> alt="Third slide" id="aa"></a>
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
<div class="page-header">
</br></br>
<h2><p>这些不错：</p></h2>
</br></br>
<h3><p>你的推荐序列包含了最新，最火，最令你着迷的游戏</p></h3>
<h3><p>推荐序列会随着你花费的提高而趋于稳定。</p></h3>
<?php 
if($arr){
  echo "<h3><p>下列游戏符合你 ";
  for($a=0;$a<count($arr);$a++){
    echo '"'.$arr[$a]['name'].'" ';
  }
  echo "的口味</p></h3>";
}
else {
  echo "<h3><p>你没有品位</h3></p>";
}
?>
</div>

<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >                 <!--推荐栏-->
	<div style ="position:relative;float:left;"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$rec[0][0]?>"><img src=<?php echo $tj1?> width="320" height="240" /></a>
   <span><?php echo $rec[0][3]?><img src=<?php echo $rec[0][2];?> width="533" height="300" /><?php echo $rec[0][6]."<br>原价：".$rec[0][4]."<br>"."现价：".$rec[0][4]*$rec[0][5]."<br>该游戏标签：".$rec[0][7]?>
   </span>
 </div>

 <div style ="position:relative;float:left;height:239;width:319;margin-left:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$rec[1][0]?>"><img src=<?php echo $tj2?> height="239" width="319" /></a>
   <p><?php echo $rec[1][3]?><img src=<?php echo $rec[1][2]?> width="533" height="300" /><?php echo $rec[1][6]."<br>原价：".$rec[1][4]."<br>"."现价：".$rec[1][4]*$rec[1][5]."<br>该游戏标签：".$rec[1][7]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:240;width:319;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$rec[2][0]?>"><img src=<?php echo $tj3?> height="240" width="319"/></a>
   <p><?php echo $rec[2][3]?><img src=<?php echo $rec[2][2]?> width="533" height="300" /><?php echo $rec[2][6]."<br>原价：".$rec[2][4]."<br>"."现价：".$rec[2][4]*$rec[2][5]."<br>该游戏标签：".$rec[2][7]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:240;width:319;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$rec[3][0]?>"><img src=<?php echo $tj4?> height="240" width="319"/></a>
   <p><?php echo $rec[3][3]?><img src=<?php echo $rec[3][2]?> width="533" height="300" /><?php echo $rec[3][6]."<br>原价：".$rec[3][4]."<br>"."现价：".$rec[3][4]*$rec[3][5]."<br>该游戏标签：".$rec[3][7]?>
   </p>
 </div>
</div>

<br><br><br><br><br><br><br><br><br>
<div class="page-header">
</br></br>
<h2>
  <p>大家都在玩：</p>
</h2>
</div>
<?php
//这里打印出大家买的最多的（总价格最贵）游戏
$th1_sql="select game_id,sum(buy_price)from library group by game_id ORDER BY sum(buy_price) DESC limit 3";
$th1_q=mysqli_query($con,$th1_sql);
if($th1_q && is_object($th1_q)){
	while($th1_z=mysqli_fetch_row($th1_q)){                 //必须有个变量，否则只有一行数据
		$th1_jg[]=$th1_z;
	}
}       
// print_r("<pre>");
// print_r($th1_jg);
$th1=$th1_jg[0][0];
$th2=$th1_jg[1][0];
$th3=$th1_jg[2][0];
$th_tj1_sql="SELECT label.game_id,cover.cover_addr,picture.addr,game.game_name,game.price,game.discount,game.introduction,group_concat(label_id.name) FROM label inner join cover on label.game_id=cover.game_id inner join picture on picture.game_id=label.game_id inner join game on game.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id where game.game_id='$th1' group by game.game_id";
$th_tj1=mysqli_fetch_row(mysqli_query($con,$th_tj1_sql));
// print_r($th_tj1);

$th_tj2_sql="SELECT label.game_id,cover.cover_addr,picture.addr,game.game_name,game.price,game.discount,game.introduction,group_concat(label_id.name) FROM label inner join cover on label.game_id=cover.game_id inner join picture on picture.game_id=label.game_id inner join game on game.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id where game.game_id='$th2' group by game.game_id";
$th_tj2=mysqli_fetch_row(mysqli_query($con,$th_tj2_sql));
// print_r($th_tj2);

$th_tj3_sql="SELECT label.game_id,cover.cover_addr,picture.addr,game.game_name,game.price,game.discount,game.introduction,group_concat(label_id.name) FROM label inner join cover on label.game_id=cover.game_id inner join picture on picture.game_id=label.game_id inner join game on game.game_id=label.game_id inner join label_id on label.label_id=label_id.label_id where game.game_id='$th3' group by game.game_id";
$th_tj3=mysqli_fetch_row(mysqli_query($con,$th_tj3_sql));
// print_r($th_tj3);
?>
<br><br><br><br><br><br>
<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >                 <!--三小-->
	<div style ="position:relative;float:right;"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$th_tj1[0]?>"><img src=<?php echo $th_tj1[1]?> width="425" height="240" /></a>
   <p><?php echo $th_tj1[3]?><img src=<?php echo $th_tj1[2]?> width="533" height="300" /><?php echo $th_tj1[6]."<br>原价：".$th_tj1[4]."<br>现价：".$th_tj1[4]*$th_tj1[5]."<br>该游戏标签：".$th_tj1[7]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$th_tj2[0]?>"><img src=<?php echo $th_tj2[1]?> height="239" width="425" /></a>
   <span><?php echo $th_tj2[3]?><img src=<?php echo $th_tj2[2]?> width="533" height="300" /><?php echo $th_tj2[6]."<br>原价：".$th_tj2[4]."<br>现价：".$th_tj2[4]*$th_tj2[5]."<br>该游戏标签：".$th_tj2[7]?>
   </span>
 </div>

 <div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$th_tj3[0]?>"><img src=<?php echo $th_tj3[1]?> height="240" width="425"/></a>
   <span><?php echo $th_tj3[3]?><img src=<?php echo $th_tj3[2]?> width="533" height="300" /><?php echo $th_tj3[6]."<br>原价：".$th_tj3[4]."<br>现价：".$th_tj3[4]*$th_tj3[5]."<br>该游戏标签：".$th_tj3[7]?>
   </span>
 </div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
//随便打印几个游戏
$sb_sql="SELECT game.*,cover.cover_addr,picture.addr,group_concat(label_id.name) from label inner join cover on cover.game_id=label.game_id inner join game on game.game_id=label.game_id inner join picture on picture.game_id=game.game_id inner join label_id on label.label_id=label_id.label_id group by game.game_id order by rand() limit 9";
$sb_q=mysqli_query($con,$sb_sql);
if($sb_q && is_object($sb_q)){
  while($suibian=mysqli_fetch_row($sb_q)){                    
   $sb_jg[]=$suibian;
 }
}
  // print_r("<pre>");
 // print_r($sb_jg);
$sb1=$sb_jg[0][6];
$sb2=$sb_jg[1][6];
$sb3=$sb_jg[2][6];
$sb4=$sb_jg[3][6];
$sb5=$sb_jg[4][6];
$sb6=$sb_jg[5][6];
	// echo $sb6;
	// print_r($sb_jg);
?>


<div class="page-header">
</br></br>
<h2><p>其他游戏：</p></h2>
</div>

<br><br><br><br><br><br>
<div style="margin-left:311px;position:absolute;height:240px;width:1280px;background-color:black" >                 <!--三小-->
 <div style ="position:relative;float:right;"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[6][0]?>"><img src=<?php echo $sb_jg[6][6]?> width="425" height="240" /></a>
   <p><?php echo $sb_jg[6][1]?><img src=<?php echo $sb_jg[6][7]?> width="533" height="300" /><?php echo $sb_jg[6][4]."<br>原价：".$sb_jg[6][2]."<br>"."现价：".$sb_jg[6][2]*$sb_jg[6][3]."<br>该游戏标签：".$sb_jg[6][8]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[7][0]?>"><img src=<?php echo $sb_jg[7][6]?> height="239" width="425" /></a>
   <span><?php echo $sb_jg[7][1]?><img src=<?php echo $sb_jg[7][7]?> width="533" height="300" /><?php echo $sb_jg[7][4]."<br>原价：".$sb_jg[7][2]."<br>"."现价：".$sb_jg[7][2]*$sb_jg[7][3]."<br>该游戏标签：".$sb_jg[7][8]?>
   </span>
 </div>

 <div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[8][0]?>"><img src=<?php echo $sb_jg[8][6]?> height="240" width="425"/></a>
   <span><?php echo $sb_jg[8][1]?><img src=<?php echo $sb_jg[8][7]?> width="533" height="300" /><?php echo $sb_jg[8][4]."<br>原价：".$sb_jg[8][2]."<br>"."现价：".$sb_jg[8][2]*$sb_jg[8][3]."<br>该游戏标签：".$sb_jg[8][8]?>
   </span>
 </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

<div style="margin-left:311px;position:absolute;height:480px;width:1280px;background-color:black" >                 <!--右大左小-->
 <div style ="position:relative;float:right;"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[0][0]?>"><img src=<?php echo $sb1?> width="852" height="480" /></a>
   <p><?php echo $sb_jg[0][1]?><img src=<?php echo $sb_jg[0][7]?> width="533" height="300" /><?php echo $sb_jg[0][4]."<br>原价：".$sb_jg[0][2]."<br>"."现价：".$sb_jg[0][2]*$sb_jg[0][3]."<br>该游戏标签：".$sb_jg[0][8]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[1][0]?>"><img src=<?php echo $sb2?> height="239" width="425" /></a>
   <span><?php echo $sb_jg[1][1]?><img src=<?php echo $sb_jg[1][7]?> width="533" height="300" /><?php echo $sb_jg[1][4]."<br>原价：".$sb_jg[1][2]."<br>"."现价：".$sb_jg[1][2]*$sb_jg[1][3]."<br>该游戏标签：".$sb_jg[1][8]?>
   </span>
 </div>

 <div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[2][0]?>"><img src=<?php echo $sb3?> height="240" width="425"/></a>
   <span><?php echo $sb_jg[2][1]?><img src=<?php echo $sb_jg[2][7]?> width="533" height="300" /><?php echo $sb_jg[2][4]."<br>原价：".$sb_jg[2][2]."<br>"."现价：".$sb_jg[2][2]*$sb_jg[2][3]."<br>该游戏标签：".$sb_jg[2][8]?>
   </span>
 </div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br>

<div style="margin-left:311px;position:absolute;height:480px;width:1280px;background-color:black" >                 <!--左大右小-->
 <div style ="position:relative;float:left;"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[3][0]?>"><img src=<?php echo $sb4?> width="852" height="480" /></a>
   <p><?php echo $sb_jg[3][1]?><img src=<?php echo $sb_jg[3][7]?> width="533" height="300" /><?php echo $sb_jg[3][4]."<br>原价：".$sb_jg[3][2]."<br>"."现价：".$sb_jg[3][2]*$sb_jg[3][3]."<br>该游戏标签：".$sb_jg[3][8]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:239;width:425;margin-left:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[4][0]?>"><img src=<?php echo $sb5?> height="239" width="425" /></a>
   <p><?php echo $sb_jg[4][1]?><img src=<?php echo $sb_jg[4][7]?> width="533" height="300" /><?php echo $sb_jg[4][4]."<br>原价：".$sb_jg[4][2]."<br>"."现价：".$sb_jg[4][2]*$sb_jg[4][3]."<br>该游戏标签：".$sb_jg[4][8]?>
   </p>
 </div>

 <div style ="position:relative;float:left;height:240;width:425;margin-left:1px;margin-top:1px"class="game">
   <a href="<?php echo "/new/game.php?game_id=".$sb_jg[5][0]?>"><img src=<?php echo $sb6?> height="240" width="425"/></a>
   <p><?php echo $sb_jg[5][1]?><img src=<?php echo $sb_jg[5][7]?> width="533" height="300" /><?php echo $sb_jg[5][4]."<br>原价：".$sb_jg[5][2]."<br>"."现价：".$sb_jg[5][2]*$sb_jg[5][3]."<br>该游戏标签：".$sb_jg[5][8]?>
   </p>
 </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
