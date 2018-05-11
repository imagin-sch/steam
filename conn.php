
<?php
DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('db_host','127.0.0.1');
DEFINE('DB_NAME','steam');
$con=@mysqli_connect(db_host,DB_USER,DB_PASSWORD,DB_NAME) OR die ('couldnt connect'.mysqli_connect_error());
$sql='select * from user';
$result = mysqli_query($con, $sql);
if($result){
}

?>