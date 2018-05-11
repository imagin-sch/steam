
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<br><br><br><br>
<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');
if(isset($_COOKIE['a'])==0){
	echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$label_sql="SELECT * from game";
$label_q=mysqli_query($con,$label_sql);
if($label_q&&is_object($label_q)){
	while($label_suibian=mysqli_fetch_row($label_q)){                 													
		$label_result[]=$label_suibian;
	}
} 
echo "<form action=\"change_i.php\" method=\"post\" style=\"margin-left:230;\">";	
echo "<h3 style=\"text-indent:1em;\">首页第一个游戏</h3>";
echo "<br>";
echo "<select class=\"form-control\"style=\"width:200px;margin-left:20px\" name =\"first\">";
for($i=0;$i<count($label_result);$i++){
	$num=$label_result[$i][0];
	$name=$label_result[$i][1];
	echo "<option value=$num>$name</option>";
}
echo "</select>";
echo "<br>";
echo "<h3 style=\"text-indent:1em;\">首页第二个游戏</h3>";
echo "<br>";
echo "<select class=\"form-control\"style=\"width:200px;margin-left:20px\" name =\"second\">";
for($i=0;$i<count($label_result);$i++){
	$num=$label_result[$i][0];
	$name=$label_result[$i][1];
	echo "<option value=$num>$name</option>";
}
echo "</select>";
echo "<br>";
echo "<h3 style=\"text-indent:1em;\">首页第三个游戏</h3>";
echo "<br>";
echo "<select class=\"form-control\"style=\"width:200px;margin-left:20px\" name =\"third\">";
for($i=0;$i<count($label_result);$i++){
	$num=$label_result[$i][0];
	$name=$label_result[$i][1];
	echo "<option value=$num>$name</option>";
}
echo "</select>";
echo "<button type=\"submit\" class=\"btn btn-primary\" style=\"margin-left:30;margin-top:30\">提交</button>";
echo "<button style=\"margin-left:30;margin-top:30\" type=\"button\" class=\"btn btn-primary\" onclick = \"javascrtpt:window.location.href='/new/first_gly.php'\">返回</button>";
echo "</from>"
?>