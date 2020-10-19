<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
$pid = $_POST['idBooking'];
$last_update = $_POST['last_update'];
$numberOder = $_POST['numberOder'];
$totalNewOrder = $_POST['totalNewOrder'];

$orderID = $_POST['orderID'];
$emailAgency = $_POST['emailAgency'];
        
for($n=0; $n < $numberOder; $n++) {
    update_post_meta($pid, 'order_detail'.'_'.$n.'_'.'name_pro' ,$_POST['prod_name_'.$n], true);
    update_post_meta($pid, 'order_detail'.'_'.$n.'_'.'quantity' ,$_POST['prod_quan_'.$n], false);
    update_post_meta($pid, 'order_detail'.'_'.$n.'_'.'price' ,$_POST['prod_price_'.$n], false);
}
update_field('last_update', $last_update, $pid);
update_field('total', $totalNewOrder, $pid);


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
$from = "raphateamailer@gmail.com"; // Reply to this email


$to="hnguyen@raphatea.org";
$to2="khang.pham@raphatea.org";
$to3="thanhly@raphatea.org";


$name="RaphaTea Booking System System "; // Recipient's name

$mail->From = $from;
$mail->FromName = "RaphaTea Booking System"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);
$mail->AddAddress($to2,$name);
$mail->AddAddress($to3,$name);
$mail->AddAddress($emailAgency,$name);

$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "NEW UPDATE BY CLIENT FROM ORDER #" .$orderID ;
$mail->CharSet = 'UTF-8';

$orderDetail = "";

for($n=0; $n<$numberOder; $n++) {
	$namepro = $_POST['prod_name_'.$n];
	$quanpro = $_POST['prod_quan_'.$n];
	$pricepro = $_POST['prod_price_'.$n];
	$rate = $quanpro * $pricepro;
	$orderDetail .= "
		<tr>
			<td>$namepro x $quanpro</td>
			<td>$ $rate</td>
		</tr>
	";
}
$orderDetail .= "
    <tr>
        <td colspan='2'>Total: $totalNewOrder</td>
    </tr>
";


$mail->Body = "
<style type='text/css'> .bold{font-size:16px;font-weight:bold;} </style>
Order #$orderID is update at $last_update

<table style='width:600px;border-collapse: collapse;'>
	<tr>
	<td><img src='http://raphatea.org/data/logo.png'></td>
	<td>ORDER #$orderID</td>
	</tr>
</table>	
	
<p style='font-size:16px;font-weight:bold;'>Thank you for your purchase!</p>

Dear Sir/Madam $fullname,<br>
We appreciateciate your order, and are currently processing it.

<table style='width:600px;border-collapse: collapse;'>
	<tr>
		<td colspan='2'>ORDER SUMMARY</td>
		$orderDetail
	</tr>
</table>

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