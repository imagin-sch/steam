<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$id=$_POST['id'];
$judge_sql="SELECT * from user where user_id='$id'";
$judge_q=mysqli_query($con,$judge_sql);
$judge_res=mysqli_fetch_row($judge_q);
print_r($judge_res);
if($judge_res[5]==2){
	echo "<script>alert(\"想什么呢，敢封管理员？\"),location.href=\"/new/fenghao.php\"</script>";
}
else{
	echo "<script>var a=confirm(\"真的要痛下杀手吗？\");if(a==true){location.href=\"/new/fh.php?id=$id\"}else{location.href=\"/new/fenghao.php\"}</script>";
}
?>