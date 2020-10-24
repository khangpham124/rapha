<?php /* Template Name: Logout */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs-user/footer.php");
if(!$_COOKIE['login_cookies']) {
    echo "<script>window.location.href='".APP_URL."login';</script>";
} else {
    ?>
    <script>
        eraseCookie('login_cookies');
    </script>
    <?php
    header('Location:'.APP_URL.'login');
    echo "<script>window.location.href='".APP_URL."login';</script>";
}
?>
