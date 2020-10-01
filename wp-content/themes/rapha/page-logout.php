<?php /* Template Name: Logout */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
if(!$_COOKIE['login_cookies']) {
    header('Location:'.APP_URL.'login');
} else {
    setcookie('login_cookies', null, -1, '/'); 
    header('Location:'.APP_URL.'login');
}
?>
