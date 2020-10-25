<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
$email_rep = get_field('mail_company',COMPANY_ID);
//SEND MAIL 

// 設定
include(LOAD_PATH."/mail/class.phpmailer.php");
include(LOAD_PATH."/mail/class.smtp.php"); 


$fullname = $_POST['fullname'];
$emailAgency = $_POST['emailAgency'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$address = $_POST['address'];

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.googlemail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "raphateamailer@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "B#*0906350881b"; // your SMTP password or your gmail password
$from = $email_rep; // Reply to this email


// $to="hnguyen@raphatea.org";
$to2="khang.pham@raphatea.org";
// $to3="thanhly@raphatea.org";


$name="RaphaTea Booking System System "; // Recipient's name

$mail->From = $from;
$mail->FromName = "RaphaTea Booking System"; // Name to indicate where the email came from when the recepient received
// $mail->AddAddress($to,$name);
$mail->AddAddress($to2,$name);
// $mail->AddAddress($to3,$name);
$mail->AddAddress($emailAgency,$name);


$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Message contatct from RaphaTeat.Org";
$mail->CharSet = 'UTF-8';

$mail->Body = "
<style type='text/css'> .bold{font-size:16px;font-weight:bold;} </style>
<p style='font-size:16px;font-weight:bold;'>Thank you for your informatio!</p>

<strong class='bold'>Dear Sir/Madam $fullname,</strong><br>


<table style='width:600px;border-collapse: collapse;'>
	<tr>
		<td style='border:1px solid #ccc;padding:5px' colspan='2'>INFORMATION</td>
	</tr>
	<tr>
		<td style='border:1px solid #ccc;padding:5px'>Fullname</td>
		<td style='border:1px solid #ccc;padding:5px'>$fullname</td>
	</tr>
	<tr>
		<td style='border:1px solid #ccc;padding:5px'>Email</td>
		<td style='border:1px solid #ccc;padding:5px'>$emailAgency</td>
	</tr>
	<tr>
		<td style='border:1px solid #ccc;padding:5px'>Phone</td>
		<td style='border:1px solid #ccc;padding:5px'>$phone</td>
	</tr>
	<tr>
		<td style='border:1px solid #ccc;padding:5px'>Address</td>
		<td style='border:1px solid #ccc;padding:5px'>$address</td>
	</tr>
	<tr>
		<td style='border:1px solid #ccc;padding:5px'>Message</td>
		<td style='border:1px solid #ccc;padding:5px'>$message</td>
	</tr>
</table>

---------------------------------------------------------------<br>
RaphaTea<br>
<img src='http://raphatea.org/data/logo.png'><br>
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