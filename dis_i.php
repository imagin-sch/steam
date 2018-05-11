<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$discount=$_POST['discount'];
$insert_sql="UPDATE game set discount='$discount' where game_id='$game_id'";
echo $insert_sql;
$insert_q=mysqli_query($con,$insert_sql);
header("Location:/new/game_kfs.php?game_id=$game_id/");
?> 