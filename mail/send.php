<?
include "class.phpmailer.php"; 
include "class.smtp.php"; 


$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.googlemail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "raphateamailer@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "B#*0906350881b"; // your SMTP password or your gmail password
$from = "raphateamailer@gmail.com"; // Reply to this email

//$to="khang@alive-web.co.jp";
$to="khangpham421@gmail.com";
//$to="vnecosolutions@gmail.com"; // mail nhan
$to2= $input3; // mail nhan

$name="VES System "; // Recipient's name

$mail->From = $from;
$mail->FromName = "VES-vn.com System"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);

//$mail->AddReplyTo($from,"khang test");
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Mail from Ves-vn.com";
$mail->CharSet = 'UTF-8';
$mail->Body = "
<b>Liên hệ</b><br><br>


Họ tên: $input1<br>

E-mail: $input2<br>

Nội dung : $input3<br>


---------------------------------------------------------------<br><br>
<img src='http://ves-vn.com/img/lien-he/logo_small.png' ><br>
Công ty cổ phần VES<br>
6A Nguyễn Cảnh Dị, P. 4, Q. Tân Bình, TP HCM<br>
Số điện thoại: +84 (8) 6295 4513<br>
Hotline: 0969 100 888<br>
Email: andy.nguyen@ves-vn.com<br>
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