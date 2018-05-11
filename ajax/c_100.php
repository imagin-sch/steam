<?php
require "../conn.php";
$w=$_COOKIE['a'];
$user_sql="select * from user where user_id='$w'";
$user_result=mysqli_query($con,$user_sql);
$user_arr=mysqli_fetch_row($user_result);
$user_re_100=$user_arr[4]+100;
$charge_sql_100="update user set remainder='$user_re_100' where user_id='$w'";
$charge_sql_100_result=mysqli_query($con,$charge_sql_100);
header('Location: /new/charge.php/');
?>