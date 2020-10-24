<?php /* Template Name: Cart */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
</head>

<body id="address_page" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                <h2 class="h2_page">Your cart (<span class="js-numbCart"></span>)</h2>
                <ul class="list-cart" id="list-prod">
                Your cart is empty
                </ul>
                <p class="taC btn-checkout"><a href="<?php echo APP_URL; ?>checkout" class="btn-page">Checkout</a></p>
            </div>
        </div>

        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>        
    <script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/checkout.js"></script>
</body>
</html>	