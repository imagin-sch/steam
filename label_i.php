<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}	
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$id=$_POST['id'];
$check_sql="select * from label where game_id='$game_id' and label_id='$id'";
$check_q=mysqli_query($con,$check_sql);
$check_result=mysqli_fetch_row($check_q);

$check_num_sql="select * from label where game_id='$game_id'";
$check_num_q=mysqli_query($con,$check_num_sql);
if($check_num_q && is_object($check_num_q)){
	while($game_label_suibian=mysqli_fetch_row($check_num_q)){                 													
		$game_label_result[]=$game_label_suibian;
	}
} 
print_r($game_label_result);
echo count($game_label_result);
if(count($game_label_result)>=5){
	echo "<script>alert(\"该游戏标签过多\"),location.href=\"/new/game_kfs.php?game_id=$game_id\"</script>";
}
else{
	if($check_result){
		echo "<script>alert(\"已有该标签\"),location.href=\"/new/label.php?game_id=$game_id\"</script>";
	}
	else {
		$insert_sql="INSERT into label values('$game_id','$id')";
		mysqli_query($con,$insert_sql);
		echo "<script>alert(\"添加成功\"),location.href=\"/new/game_kfs.php?game_id=$game_id\"</script>";
	}
}