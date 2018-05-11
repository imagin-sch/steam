<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
$id=$_GET['id'];
$sql="delete from user where user_id='$id'";
mysqli_query($con,$sql);
echo "<script>alert(\"该账号已被查水表\"),location.href=\"/new/fenghao.php\"</script>";
?>