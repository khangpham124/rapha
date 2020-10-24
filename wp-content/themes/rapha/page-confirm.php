<?php /* Template Name: Confirm */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
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
                    <p>You have successfully placed your order. Please track your order status in “Order Management”</p>
                    <p>The system will automatically redirect to home page after 3 seconds</p>
                    <a href="<?php echo APP_URL; ?>dashboard" class="btn-page mt--30">Go to Dashboard</a>
                </div>
                </div>
                
                
        </div>
        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
</body>
</html>	