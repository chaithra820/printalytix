<?php
$name =$_POST["name"];
$subject = $_POST["subject"];
$email = $_POST["email"];
$message = $_POST["message"];

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "business48.web-hosting.com";
$mail->Username   = "kaisher@webxinfinity.in";
$mail->Password   = "Webx@123";
$mail->IsHTML(true);
$mail->AddAddress("connect@printalytix.com", "contact");
$mail->SetFrom("kaisher@webxinfinity.in", "contact");
$mail->AddReplyTo("connect@printalytix.com", "contact");
$mail->AddCC("connect@printalytix.com", "contact");
$mail->Subject = "contact Info";
$content = "
 <b>Name</b>:".$name."<br>
 <b>email</b>: ".$email."<br>
 <b>Subject</b>: ".$subject."<br>
 <b>message</b>:".$message."<br>
";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  //var_dump($mail);
} else {
  echo "<script>
  alert('Your message has been sent!');
 </script>
 <h1>Redirecting.....</h1>
 <meta http-equiv='refresh' content='1; URL=index.html' />";
}
?>