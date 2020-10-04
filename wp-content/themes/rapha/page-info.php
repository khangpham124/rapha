<?php /* Template Name: Info */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
</head>

<body id="info" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                <form method="post">
                <div class="flex-box flex-box--between">
                    <div class="blockPage blockPage--full grid--48">
                        <h2 class="h2_page">Thông tin tài khoản</h2>
                        <div class="mt--30">
                        <table class="table-page">
                            <form action="" method="post">
                                <tr>
                                    <td>Fullname</td>
                                    <td><input type="text"  class="input-page" disabled value="<?php echo get_field('fullname',$userID); ?>" ></td>
                                </td>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" class="input-page" disabled value="<?php echo get_the_title($userID); ?>"</td>
                                </td>
                                <tr>
                                    <td>Phone</td>
                                    <td><input type="text" class="input-page" disabled value="<?php echo get_field('phone',$userID); ?>"</td>
                                </td>
                                <tr>
                                    <td>New password</td>
                                    <td><input type="password" class="input-page" value="" id="pw"></td>
                                </td>
                                <tr>
                                    <td>Re-password</td>
                                    <td><input type="password" class="input-page js-check-pass" value="" id="re-pw"></td>
                                </td>
                            </form>
                        </table>
                        </div>
                    </div>
                    
                </div>
                <div class="mt--30">
                    <a href="" class="btn-page js-update-info disable">Cập nhật</a>
                </div>
                <input type="hidden" name="idUser" id="idUser" value="<?php echo $userID; ?>">
                </form>
            </div>
        </div>

        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
    <script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/checkout.js"></script>
</body>
</html>	