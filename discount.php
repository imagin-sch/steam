<?php
require "conn.php";
mysqli_query($con,'SET NAMES UTF8');	
if(isset($_COOKIE['a'])==0){
    echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
}
$w=$_COOKIE['a'];
$game_id=$_GET['game_id'];
$game_sql="select * from game where game_id='$game_id'";
$game_q=mysqli_query($con,$game_sql);
$game_result=mysqli_fetch_row($game_q);
// print_r($game_result);
?>
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="container theme-showcase" role="main">
	<br><br><br><br><br><br><br>	
<h1>
	<span class="label label-success" style=";margin-left:450">原价：￥<?php echo $game_result[2]?></span>
	<br><br>
	<form action="dis_i.php?game_id=<?php echo $game_id?>" class="form-signin" name="fr" method="post">
		<span id="message" style="color:red;margin-left:340"></span>
		<input style="width:500px;margin-left:340" class="form-control" type="text" id='discount' name='discount' maxlength="20" onkeyup="calculate();" required/>
		<input style="width:500px;margin-left:340" class="form-control" type="text" id="result" disabled />
		<button style="width:500px;margin-left:340" class="form-control" type="submit" onclick="javascrtpt:window.location.href='/new/dis_i.php?game_id=<?php echo $game_id?>'">提交</button>
	</form>
	<br>
</h1>



<html>
<head>
<script type="text/javascript">
function calculate(){
	var left=<?php echo $game_result[2]?>;
    document.getElementById("result").value="";
    document.getElementById("message").innerHTML="";
    // var left = document.getElementById("left").value;
    var discount = document.getElementById("discount").value;
   	 var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber = p.test(discount);
    /*var isdiscountnumber = p.test(discount);*/
    if(!isleftnumber){
        document.getElementById("message").innerHTML="请输入数字";
        return;	
    }
    document.getElementById("message").innerHTML="";
    if(discount>1||!discount<0){
        document.getElementById("message").innerHTML="请输入0-1之间的数字";
        return;
    }
    document.getElementById("message").innerHTML="";
    if(discount<=1&&discount>=0){
        document.getElementById("result").value=left*discount;
    }      
    }
     

</script>
