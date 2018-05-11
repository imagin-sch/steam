<?php
require "../conn.php";
$w=$_COOKIE['a'];
$user_sql="select * from user where user_id='$w'";
$user_result=mysqli_query($con,$user_sql);
$user_arr=mysqli_fetch_row($user_result);
$user_re_20=$user_arr[4]+20;
$charge_sql_20="update user set remainder='$user_re_20' where user_id='$w'";
$charge_sql_20_result=mysqli_query($con,$charge_sql_20);
header('Location: /new/charge.php/');
?>