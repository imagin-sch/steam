<?php
//查询我发布的游戏，进入游戏界面
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");                           创建写新文件
$count=0;
$my_publish_sql="select * from game where altus='$user_id' limit 0+$count*9,9;
$my_pub_q=mysqli_query($con,$my_publish_sql);
if($my_pub_q && is_object($my_pub_q)){
	while($my_pub_s=mysqli_fetch_row($my_pub_q)){					
		$my_pub_arr[]=$my_pub_s;
	}
}
?>