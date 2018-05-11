<?php
require "conn.php";
date_default_timezone_set('PRC');
$game_id=$_GET['game_id'];
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$localtime=date('Y-m-d H:i:s',time());
mysqli_query($con,'SET NAMES UTF8');
$game_info_sql="select * from game where game.game_id='$game_id'";
$game_info_q=mysqli_query($con,$game_info_sql);
if($game_info_q && is_object($game_info_q)){
	while($game_info_suibian=mysqli_fetch_assoc($game_info_q)){
		$game_info_result[]=$game_info_suibian;
	}
} 
$price=$game_info_result[0]['discount']*$game_info_result[0]['price'];
$user_sql="select * from user where user_id='$w'";
$user_result=mysqli_query($con,$user_sql);
$user_arr=mysqli_fetch_row($user_result);
$user_re_20=$user_arr[4]-$price;
if($user_re_20<0){
	echo "<script>alert(\"余额不足！\"),location.href=\"/new/game.php?game_id=$game_id\"</script>";

}
else{
	$order_sql="INSERT into library values(default,'$w','$game_id','$localtime','$price')";
	mysqli_query($con,$order_sql);
	$charge_sql_20="update user set remainder='$user_re_20' where user_id='$w'";
	$charge_sql_20_result=mysqli_query($con,$charge_sql_20);
	header("Location: /new/game.php?game_id=$game_id");
}

?>