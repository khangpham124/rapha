<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
include(LOAD_PATH."/mail/class.phpmailer.php");
include(LOAD_PATH."/mail/class.smtp.php"); 
$email_rep = get_field('mail_company',COMPANY_ID);
$code = $_GET['code'];
$mypost = get_page_by_title( $code ,OBJECT, 'booking');
$postID = $mypost->ID;

$args = array(
'p' => $postID, // p -> id of post
'post_type' => 'booking',
'post_status' => 'publish',
'posts_per_page' => 1,
'caller_get_posts' => 1
);
$wp_query = null;
$wp_query = new WP_Query($args);

if($wp_query->have_posts()): $wp_query->the_post();


$totalNewOrder = get_field('total');
$extraFee = get_field('shipping_fee');
$subTotalNewOrder = get_field('sub_total');
$orderID = get_the_title();
$fullname = get_field('fullname');
$emailAgency = get_field('email');
$last_update = get_the_modified_time('d-M-Y h:i a');
$invoiceFiles =  get_field('invoice');
$fileInvoice = $invoiceFiles['url'];

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.googlemail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "raphateamailer@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "B#*0906350881b"; // your SMTP password or your gmail password
$from = $email_rep; // Reply to this email

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

$mail->addReplyTo($email_rep, 'Sales RaphaTea');

$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "NEW UPDATE BY ADMIN FROM ORDER #" .$orderID;
$mail->CharSet = 'UTF-8';



$orderDetail = '';
while(has_sub_field('order_detail')):
	$namepro = get_sub_field('name_pro');
	$quanpro = get_sub_field('quantity');
	$pricepro = get_sub_field('price');
	$rate = $quanpro * $pricepro;
	$orderDetail .= "
		<tr>
			<td>$namepro x $quanpro</td>
			<td>$ $rate</td>
		</tr>
	";
endwhile;
$orderDetail .= "
    <tr>
        <td style='border:1px solid #ccc;padding:5px' colspan='2'>Total: $totalNewOrder</td>
    </tr>
    <tr>
        <td style='border:1px solid #ccc;padding:5px' colspan='2'>Shipping and Tax Fee: $extraFee</td>
    </tr>
    <tr>
        <td style='border:1px solid #ccc;padding:5px' colspan='2'>Sub Total: $subTotalNewOrder</td>
    </tr>
";


$mail->Body = "
<style type='text/css'> .bold{font-size:16px;font-weight:bold;} </style>
Order #$orderID is update at $last_update by RaphaTea Administrator

<table style='width:600px;border-collapse: collapse;'>
	<tr style='border-bottom:1px solid #ccc;'>
	<td><img src='http://raphatea.org/data/logo.png'></td>
	<td>ORDER #$orderID</td>
	</tr>
</table>	
	
<p style='font-size:16px;font-weight:bold;'>Thank you for your purchase!</p>

Dear Sir/Madam $fullname,<br>
Your Order #$orderID has been confirmed.<br>

<table style='width:600px;border-collapse: collapse;'>
	<tr>
		<td colspan='2' style='border:1px solid #ccc;padding:5px'>ORDER SUMMARY</td>
		$orderDetail
	</tr>
</table>
<br><br>
Please click the link below to view your invoice <br>
$fileInvoice
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
    echo "<h1>Sent</h1>
    <script>
    setTimeout(function(){window.close(); }, 3000);
    </script>
    ";
}
?>

<?php endif; ?>
