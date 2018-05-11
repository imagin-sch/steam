<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$check_sql="select * from game where game_id='$game_id' and ATLUS='$w'";
$check_q=mysqli_query($con,$check_sql);
$check_result=mysqli_fetch_row($check_q);
if($check_result){
	echo "<script>var r=confirm(\"确定要下架吗\");if(r==true){location.href=\"/new/xj_i.php?game_id=$game_id\"}else{location.href=\"/new/game_kfs.php?game_id=$game_id\"}</script>";
}
else{
	echo "<script>alert(\"哥们儿，别下架别人的游戏呀\"),location.href=\"/new/game_kfs.php?game_id=$game_id\"</script>";
}
?>