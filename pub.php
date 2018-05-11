<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Theme Template for Bootstrap</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
		function display_alert()
		{
			if(confirm("Decide to quit?"))
			{
				location.href="/new/login.php";
			}
		}
	</script>

	<style type="text/css">
	p{
		text-indent: 2em;
	}

	#aa{
		display:block;
		position:relative;
		margin:auto;
		width:1280px;
		height:720px;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">             
				<a class="navbar-brand"  onclick="display_alert()">Steam</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/new/first.php">主页</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					require "conn.php";
					if(isset($_COOKIE['a'])==0){
						echo "<script>alert('登录超时！');location.href='http://39.107.228.23/';</script>";
					}
					$w=$_COOKIE['a'];
					$user_sql="select * from user where user_id='$w'";
					$user_result=mysqli_query($con,$user_sql);
					$user_arr=mysqli_fetch_row($user_result);
					?>
					<li><a onclick =javascrtpt:window.location.href="/new/kfs.php"><?php echo $user_arr[1].'(开发商)'?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php
	function uploaddd($file,$g_n){
		$file_size=$_FILES[$file]['size'];  
		if($file_size>2*1024*1024) {  
			echo "<h1 style=\"margin-left:770\">文件过大，不能上传大于2M的文件</h1>";  
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			exit();  
		}  
		$file_type=$_FILES[$file]['type'];  
    // echo $file_type;  
		if($file_type!="image/jpeg" && $file_type!='image/pjpeg') {  
			echo "<h1 style=\"margin-left:780\">文件类型只能为jpg格式</h1>";  
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			exit();  
		}  
	    //判断是否上传成功（是否使用post方式上传）  
		if(is_uploaded_file($_FILES[$file]['tmp_name'])) {  
        //把文件转存到你希望的目录（不要使用copy函数）  
			$uploaded_file=$_FILES[$file]['tmp_name'];   
        //我们给每个用户动态的创建一个文件夹  
			$user_path=$_SERVER['DOCUMENT_ROOT']."/img/up/".$g_n;
        //判断该用户文件夹是否已经有这个文件夹  
			if(!file_exists($user_path)) {  
				mkdir($user_path);  
			}  
			$file_true_name=$_FILES[$file]['name'];  
			$move_to_file=$user_path."/". $file_true_name;  
        //echo "$uploaded_file   $move_to_file";  
			if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
				return 1;
			} else {  
				return 0;
			}  
		} else {  
			return 0;  
		}  
	}
	$new_g_label=$_POST['what'];
	$new_g_name=$_POST['name'];
	$new_g_price=$_POST['price'];
	$new_g_intro=$_POST['intro'];
	$new_g_atlus=$w;
// echo $new_g_label."<br>".$new_g_name."<br>".$new_g_price."<br>".$new_g_intro."<br>".$new_g_atlus;
	if(!$new_g_name||!$new_g_price||!$new_g_price||!$new_g_intro||!$_FILES["cover"]["name"]||!$_FILES["pic"]["name"]){
		if(!$new_g_name){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1 style=\"margin-left:800\">游戏名不得为空</h1>";
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			goto b;
		}
		if(!$new_g_price){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1 style=\"margin-left:790\">游戏价格不得为空</h1>";
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			goto b;
		}

		if(!$new_g_intro){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1 style=\"margin-left:800\">游戏介绍不得为空</h1>";
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			goto b;
		}

		if(!$_FILES["pic"]["name"]){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1 style=\"margin-left:770\">游戏介绍图片不得为空</h1>";
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			goto b;
		}	
		if(!$_FILES["cover"]["name"]){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1 style=\"margin-left:770\">游戏封面图片不得为空</h1>";
			echo "<br>";
			echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
			goto b;
		}	
	}
	else{
		$yy=mysqli_query($con,"select * from game where game_name='$new_g_name'");
		if(mysqli_num_rows($yy) ==1)
			goto a;
		if(uploaddd('cover',$new_g_name)&&uploaddd('pic',$new_g_name)){
			$new_game_sql="insert into game values(default,'$new_g_name','$new_g_price',default,'$new_g_intro','$new_g_atlus')";
			mysqli_query($con,$new_game_sql);
$new_g_id_sql="select game_id from game where game_name='$new_g_name' and price='$new_g_price' and introduction='$new_g_intro' and ATLUS='$new_g_atlus'";//查询刚刚的游戏id
$new_g_id_q=mysqli_query($con,$new_g_id_sql);
// echo "<br>".$new_g_id_q;
$new_g_id_a=mysqli_fetch_row($new_g_id_q);
$new_g_id=$new_g_id_a[0];
// echo $new_g_id;				

$new_g_cover="/img/up/".$new_g_name."/".$_FILES['cover']['name'];
$new_g_pic="/img/up/".$new_g_name."/".$_FILES['pic']['name'];
$new_cover_sql="insert into cover values('$new_g_id','$new_g_cover')";
mysqli_query($con,$new_cover_sql);
$new_pic_sql="insert into picture values('$new_g_id','$new_g_pic')";
mysqli_query($con,$new_pic_sql);
$new_label_sql="insert into label values('$new_g_id','$new_g_label')";
mysqli_query($con,$new_label_sql);
goto c;

}
else {
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<h1 style=\"margin-left:830\">图片上传失败</h1>";
	echo "<br>";
	echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
	goto b;	
	
	
}
}
a:
echo "";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1 style=\"margin-left:830\">游戏名重复！</h1>";
echo "<br>";
echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";

c:
echo "";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1 style=\"margin-left:830\">发布游戏成功！</h1>";
echo "<br>";
echo "<button  style=\"margin-left:890;margin-top:20;\" type=\"button\" class=\"btn btn-success \"onclick = \"javascrtpt:window.location.href='/new/publish.php'\">return</button>";
b:
?>