<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$address = $_POST['address'];
		$idUser = $_POST['idUser'];
		$orderDate = $_POST['orderDate'];
		$noted = $_POST['noted'];
		$orderDate = $_POST['orderDate'];
		$totalPrice = $_POST['totalPrice'];

		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];


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
		update_post_meta($pid, 'email', $email);
		
		$listBooking = array();
		$numberOder = $_POST['numberOder'];
		
		for($n=0; $n<$numberOder; $n++) {
			$listBooking[$n]['name_pro'] = $_POST['prod_name_'.$n];
			$listBooking[$n]['quantity'] = $_POST['prod_quan_'.$n];
			$listBooking[$n]['price'] = $_POST['prod_price_'.$n];
		}
		update_field('order_detail', $listBooking, $pid);

//SEND MAIL 

$aMailto = array("khang.pham@navigosgroup.com","khangpham421@gmail.com","khang.pham@raphatea.org");
$from = "raphateamailer@gmail.com";

// 設定
require(LOAD_PATH."/mailer/jphpmailer.php");

$msgBody = "
■Fullname
$fullname

■Phone
$phone

■Address to deliver
$address

■Order Date
$orderDate
";


for($n=0; $n<$numberOder; $n++) {
	$namepro = $listBooking[$n]['name_pro'];
	$quanpro = $listBooking[$n]['quantity'];
	$pricepro = $listBooking[$n]['price'];
	$msgBody .="
		$namepro - $quanpro - $pricepro
	";
}

$msgBody .="
Total:
$totalPrice
";


echo $msgBody;

//お問い合わせメッセージ送信
	$subject = "Mail booking from Rapha Tea";
	$body = "
    
    Hi,
    $msgBody
    ";

//お客様用メッセージ
	$subject1 = "Mail booking from Rapha Tea";
	$body1 = "

    Dear $reg_name

    Mail confirm your booking
    ---------------------------------------------------------------
    ---------------------------------------------------------------

    $msgBody

    ---------------------------------------------------------------
    Rapha Tea
    ---------------------------------------------------------------
";

	// メール送信
	mb_language("ja");
	mb_internal_encoding("UTF-8");
	
	$fromname = "Rapha Tea booking System";

	$email1 = new JPHPmailer();
	$email1->addTo($email);
	$email1->setFrom($from,$fromname);
	$email1->setSubject($subject1);
	$email1->setBody($body1);

	if($email1->send()) {};
	
	//メール送信
	$email = new JPHPmailer();
	for($i = 0; $i < count($aMailto); $i++)
	{
		$email->addTo($aMailto[$i]);
	}
	$email->setFrom($email, 'Rapha Tea booking System');
	$email->setSubject($subject);
	$email->setBody($body);

	if($email->Send()) {};
			

?>