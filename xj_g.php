<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$delete1_sql="delete from label where game_id='$game_id'";
mysqli_query($con,$delete1_sql);
$delete2_sql="delete from picture where game_id='$game_id'";
mysqli_query($con,$delete2_sql);
$delete3_sql="delete from cover where game_id='$game_id'";
mysqli_query($con,$delete3_sql);
$delete4_sql="delete from library where game_id='$game_id'";
mysqli_query($con,$delete4_sql);
$delete5_sql="delete from play where game_id='$game_id'";
mysqli_query($con,$delete5_sql);
$check_sql="delete from game where game_id='$game_id'";
mysqli_query($con,$check_sql);

echo "<script>alert(\"下架成功\"),location.href=\"/new/first_gly.php\"</script>";

?>