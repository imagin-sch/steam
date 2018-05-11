<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$check_user_sql="SELECT * from user where user_id ='$w'";
$check_user_q=mysqli_query($con,$check_user_sql);
$check_user_result=mysqli_fetch_row($check_user_q);

if($check_user_result[5]==2){
	echo "<script>var a=confirm(\"确定要下架吗\");if(a==true){location.href=\"/new/xj_g.php?game_id=$game_id\"}else{location.href=\"/new/game_gly.php?game_id=$game_id\"}</script>";
}
else{
	echo "<script>alert(\"哥们儿你谁啊\"),location.href=\"/new/login.php\"</script>";
}