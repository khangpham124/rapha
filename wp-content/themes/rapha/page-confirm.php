<?php /* Template Name: Confirm */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(APP_PATH."libs-user/head.php");
?>

</head>

<body id="confirm" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                
                <div class="confirm-box">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <p>Bạn đã đặt hàng thành công , vui lòng theo dõi đơn hàng trong mục "Quản lý đơn hàng"</p>
                    <a href="<?php echo APP_URL; ?>dashboard" class="btn-page mt--30">Trang chủ</a>
                </div>
                </div>
                
                
        </div>
        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
</body>
</html>	