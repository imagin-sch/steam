<?php
require "../conn.php";
$w=$_COOKIE['a'];
$id=$_GET['id'];
$like_sql="INSERT into comment_fond values(null,'$w','$id','1',default)";
$result=mysqli_query($con,$like_sql);
header("Location: /new/game.php?game_id=$id");
?>