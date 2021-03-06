<?php echo('<?xml version="1.0" encoding="UTF-8"?>'); ?>
<!DOCTYPE html>
<html lang="en">
<?php 
include get_theme_file_path( 'lang.php' );
if(!isset($_COOKIE['lang_web'])) {
	$lang_web = 'en';
} else {
	$lang_web = $_COOKIE['lang_web'];
}
$time = current_time( 'Y-m-d' );
?>
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
<meta content="width=<?php echo $width; ?>" name="viewport">
<?php else: ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<?php endif; ?>
<!--responsive or smartphone-->

<?php include(APP_PATH."libs/argument.php"); ?>
<title>RaphaTea | Boba Tea House</title>
<meta name="description" content="<?php echo $desPage; ?>">
<meta name="keywords" content="<?php echo $keyPage; ?>">

<!--facebook-->
<meta property="og:title" content="<?php echo $titlepage; ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo 'http://';echo $_SERVER["SERVER_NAME"];echo $_SERVER["SCRIPT_NAME"];echo $_SERVER["QUERY_STRING"]; ?>">
<meta property="og:image" content="<?php echo APP_ASSETS; ?>img/other/fb_image.jpg">
<meta property="og:site_name" content="">
<meta property="og:description" content="<?php echo $desPage; ?>">
<meta property="fb:app_id" content="">
<!--/facebook-->

<!--css-->
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/style.css?ver=<?php echo $time; ?>" media="all">

<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css'>
<!--/css-->
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;700&family=Josefin+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--favicons-->
<link rel="icon" href="<?php echo APP_ASSETS; ?>img/icon/favicon.ico" type="image/vnd.microsoft.icon">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

