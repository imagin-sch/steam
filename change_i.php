<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$first=$_POST['first'];
$second=$_POST['second'];
$third=$_POST['third'];
/*echo $first;
echo $second;
echo $third;*/
$first_sql="UPDATE home set game_id='$first'where info='1'";
$second_sql="UPDATE home set game_id='$second'where info='2'";
$third_sql="UPDATE home set game_id='$third'where info='3'";
mysqli_query($con,$first_sql);
mysqli_query($con,$second_sql);
mysqli_query($con,$third_sql);
echo "<script>alert(\"更改成功！\"),location.href=\"/new/first_gly.php\"</script>";
?>