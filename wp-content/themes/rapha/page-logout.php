<?php /* Template Name: Logout */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
if(!$_COOKIE['login_cookies']) {
    header('Location:'.APP_URL.'login');
} else {
    setcookie('login_cookies', null, -1, '/'); 
    header('Location:'.APP_URL.'login');
}
?>
