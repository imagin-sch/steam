<?php
require "../conn.php";
$w=$_COOKIE['a'];
$user_sql="select * from user where user_id='$w'";
$user_result=mysqli_query($con,$user_sql);
$user_arr=mysqli_fetch_row($user_result);
$user_re_50=$user_arr[4]+50;
$charge_sql_50="update user set remainder='$user_re_50' where user_id='$w'";
$charge_sql_50_result=mysqli_query($con,$charge_sql_50);
header('Location: /new/charge.php/');
?>