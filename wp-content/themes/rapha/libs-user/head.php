<?php
	if((!$_COOKIE['login_cookies'])) {
		echo "<script>window.location.href='".APP_URL."login';</script>";
		exit;
	}
?>
<?php echo('<?xml version="1.0" encoding="UTF-8"?>'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!--responsive or smartphone-->
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php
	// set viewport by user agent.
	require_once 'ua.class.php';
	$ua = new UserAgent();
	if($ua->set() === 'tablet') :
		// set width when you use the tablet
		$width = '1024px';
?>
<meta content="width=<?php echo $width = 1024; ?>" name="viewport">
<?php else: ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<?php endif; ?>
<!--responsive or smartphone-->

<title><?php echo $titlepage = 'Rapha Tea Dashboard'; ?></title>

<!--css-->
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/style.css" media="all">
<!--/css-->
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--favicons-->
<link rel="icon" href="<?php echo APP_ASSETS; ?>img/icon/favicon.ico" type="image/vnd.microsoft.icon">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php
	$mypost = get_page_by_title( $_COOKIE['login_cookies'], '', 'agency' );
	$userID = $mypost->ID;
	$fullname = get_field('fullname',$userID);
	$email = get_the_title($userID);
	$phone = get_field('phone',$userID);
	$banned = get_field('banned',$userID);
	if($banned == 'yes') {
		echo "<script>window.location.href='".APP_URL."login';</script>";
		exit;
	}
?>

