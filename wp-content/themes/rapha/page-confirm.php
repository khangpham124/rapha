<?php /* Template Name: Confirm */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
<meta http-equiv="refresh" content="3;url=<?php echo APP_URL; ?>dashboard" />

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
                    <p>Hệ< thống sẽ tự động chuyển về trang chủ sau 3 giây</p>
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