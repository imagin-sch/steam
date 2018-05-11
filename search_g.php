<?PHP
/*
require_once('D:\code\wamp\www\PHPMailer\class.phpmailer.php');   //引入必须文件class.phpmailer.php
  $mail = new PHPMailer();    //new一个PHPMailer对象，以便操作
  $mail->isSMTP();    //设置SMTP发送
  $mail->CharSet='gb2312';     //设置字符集
  $mail->Host="smtp.163.com";    //这是服务器邮箱，即上面1中所提到的邮箱地址
  $mail->SMTPAuth = true;      //设置验证邮箱
  $mail->Port= 465; 
  $mail->Username = "piracy_steam@163.com";     //这是你自己的1中所登陆的163邮箱地址
  $mail->Password = "auvfushi";    //这是你的163邮箱的密码
  $mail->From = "piracy_steam@163.com";      //这是你自己的1中所登陆的163邮箱地址
  $mail->FromName = "bbbbbb";     //这是发送时你的名字，可随意修改
  $mail->AddAddress("auvfushi@sina.com", "成员");       //这是你要发给谁，那个人的邮箱地址和他的名字
  $mail->Subject = "aaaaaaaaaaaaa";        //这是发送的邮件的主题
  $mail->Body = "111222333";       //这是发送的邮件的内容
 print_r('<pre>');
 print_r($mail);
  if(!$mail->Send()){    						//发送邮件并判断
    die("发送失败！");
  }
  else{
   echo "发送成功！";
 }

    */
 include "D:\code\wamp\www\PHPMailer\class.phpmailer.php";  
 include "D:\code\wamp\www\PHPMailer\class.smtp.php";  
 $mail = new PHPMailer();  
$mail->isSMTP();// 使用SMTP服务  
$mail->Mailer   = "SMTP";
$mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码  
$mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址  
$mail->SMTPAuth = true;// 是否使用身份验证  
$mail->Username = "piracy_steam@163.com";// 发送方的163邮箱用户名  
$mail->Password = "dianhua11";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！  
$mail->SMTPSecure = "ssl";// 使用ssl协议方式  
$mail->Port = 456;// 163邮箱的ssl协议方式端口号是465/994  
$mail->Form= "piracy_steam@163.com";  
$mail->Helo= "xxxx";  
$mail->setFrom("piracy_steam@163.com","piracy_steam");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示  
$mail->addAddress('auvfushi@sina.com','Liang');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)  
$mail->IsHTML(true);  
$mail->Subject = "aaa";// 邮件标题  
$mail->Body = "sssssssssssssssssss";// 邮件正文  
if(!$mail->Send()){// 发送邮件  
  echo "Message could not be sent.";  
  echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息  
  echo "<br>";
  echo "<pre>";
  print_r($mail);
}else{  
  echo 'Message has been sent.';  
}  

?>