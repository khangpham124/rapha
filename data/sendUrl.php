<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
$email_rep = get_field('mail_company',COMPANY_ID);
$username = $_POST['username'];
$email = $_POST['email'];

$urlreset = APP_URL."data/resetPass.php?token=".get_field('token',$username)."&user=".$username;
// 設定
include(LOAD_PATH."/mail/class.phpmailer.php");
include(LOAD_PATH."/mail/class.smtp.php"); 

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.googlemail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "raphateamailer@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "B#*0906350881b"; // your SMTP password or your gmail password
$from = $email_rep; // Reply to this email


$name="RaphaTea Booking System"; // Recipient's name

$mail->From = $from;
$mail->FromName = "RaphaTea Booking System"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($email,get_field('fullname',$fullname));

$mail->addReplyTo($email_rep, 'Sales RaphaTea');

$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "RESET YOUR PASSWORD";
$mail->CharSet = 'UTF-8';

$mail->Body = "
<style type='text/css'> .bold{font-size:16px;font-weight:bold;} </style>
You can reset your password folloe below URL<br>
$urlreset
<br>
---------------------------------------------------------------<br>
RaphaTea<br>
---------------------------------------------------------------

"; //HTML Body
$mail->AltBody = "Mail nay duoc goi bang phpmailer class."; //Text Body
//$mail->SMTPDebug = 2;
if(!$mail->Send())
{
	echo "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
}
else
{
	echo "<h1>Send mail thanh cong</h1>";
}

?>