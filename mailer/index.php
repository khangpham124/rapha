<?php
//email list
$aMailto = array("khang.pham@navigosgroup.com","khangpham421@gmail.com");
$from = "raphateamailer@gmail.com";

// 設定
require("./jphpmailer.php");
$script = "index.php";
$gtime = time();

//お問い合わせフォーム内容
// $fullname = htmlspecialchars($_POST['name']);
// $phone = htmlspecialchars($_POST['phone']);
// $email = htmlspecialchars($_POST['email']);

$fullname = 'Khang Phạm';
$phone = '12345';
$email = 'khang.pham@navigosgroup.com';
// 処理分岐


$msgBody = "
■Fullname
$fullname

■Phone
$phone
";

//お問い合わせメッセージ送信
	$subject = "Mail booking from Rapha Tea";
	$body = "
    
    Hi,
    $msgBody
    ";

//お客様用メッセージ
	$subject1 = "Mail booking from Rapha Tea";
	$body1 = "

    $reg_name 様

    この度はお問い合わせいただきまして誠にありがとうございます。
    こちらは自動返信メールとなっております。
    弊社にて確認した後、改めてご連絡させていただきます。

    以下、お問い合わせ内容となっております。
    ご確認くださいませ。
    ---------------------------------------------------------------
    ---------------------------------------------------------------

    $msgBody

    ---------------------------------------------------------------
    About company
    ---------------------------------------------------------------
";

	// メール送信
	mb_language("ja");
	mb_internal_encoding("UTF-8");
	
	$fromname = "Rapaha Tea booking System";

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
	$email->setFrom($email, $fullname."様");
	$email->setSubject($subject);
	$email->setBody($body);

	if($email->Send()) {};
	

	// header("Location: indexThx.php");
?>
