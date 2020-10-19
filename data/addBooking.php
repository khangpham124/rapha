<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$address = $_POST['address'];
		$idUser = $_POST['idUser'];
		$orderDate = $_POST['orderDate'];
		$noted = $_POST['noted'];
		$orderDate = $_POST['orderDate'];
		$totalPrice = $_POST['totalPrice'];

		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$emailAgency = $_POST['email'];


		$IDBooking = 'RAP'. $idUser . date("Y") .date("m") . date("d") .rand(100,999);
        $customer_post = array(
            'post_title'    => $IDBooking,
            'post_content'    => $noted,
            'post_status'   => 'publish',
            'post_type' => 'booking',
        );
        $pid = wp_insert_post($customer_post); 
        
        add_post_meta($pid, 'address', $address);
        add_post_meta($pid, 'order_date', $orderDate);
		update_post_meta($pid, 'status', 'Processed');
		update_post_meta($pid, 'userid', $idUser);
		update_post_meta($pid, 'note', $noted);
		update_post_meta($pid, 'total', $totalPrice);

		update_post_meta($pid, 'fullname', $fullname);
		update_post_meta($pid, 'phone', $phone);
		update_post_meta($pid, 'email', $emailAgency);
		
		$listBooking = array();
		$numberOder = $_POST['numberOder'];
		
		for($n=0; $n<$numberOder; $n++) {
			$listBooking[$n]['name_pro'] = $_POST['prod_name_'.$n];
			$listBooking[$n]['quantity'] = $_POST['prod_quan_'.$n];
			$listBooking[$n]['price'] = $_POST['prod_price_'.$n];
		}
		update_field('order_detail', $listBooking, $pid);

//SEND MAIL 


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
$mail->Subject = "EMAIL RECEIVED BY CLIENT";
$mail->CharSet = 'UTF-8';


$orderDetail = "";

for($n=0; $n<$numberOder; $n++) {
	$namepro = $listBooking[$n]['name_pro'];
	$quanpro = $listBooking[$n]['quantity'];
	$pricepro = $listBooking[$n]['price'];
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
			<td colspan='2'>Total: $totalPrice<br>
			<span style='font-style:italic;color:#07407e;'>Subtotal does not include shipping & tax</span>
			</td>
		</tr>
	";

$mail->Body = "
<style type='text/css'> .bold{font-size:16px;font-weight:bold;} </style>
From: $fullname<br>
Order Date: $orderDate<br>
Phone:$phone<br>
<br>
<br>
<br>
Address to deliver: $address <br>
Your Order #$IDBooking is comfirmed

<table style='width:600px;border-collapse: collapse;'>
	<tr style='border-bottom:1px solid #ccc;'>
	<td><img src='http://raphatea.org/data/logo.png'></td>
	<td>ORDER #$IDBooking</td>
	</tr>
</table>	
	
<p style='font-size:16px;font-weight:bold;'>Thank you for your purchase!</p>

<strong class='bold'>Dear Sir/Madam $fullname,</strong><br>
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