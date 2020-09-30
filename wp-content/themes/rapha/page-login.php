<?php /* Template Name: Login */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");

include(APP_PATH."libs-user/head.php");
?>
</head>

<body id="login" class="dashboard">
<div id="wrapper" class="login">
    <div class="login-box">
            <p class="taC"><img src="<?php echo APP_ASSETS ?>img/header/logo.svg"></p>
            <!-- <h2 class="dashboard-h2 dashboard-text--center">Login</h2> -->
                <form method="post" action="<?php echo APP_URL; ?>data/checklog.php" class="mt--20">
                    <div class="login-box-form">
                        <input type="text" name="username" value="" placeholder="Your email">
                        <input type="password" name="password" value="" placeholder="Your password">
                    </div>
                    <p class="taC mt--20">
                        <button type="submit" class="dashboard-btn">LOGIN</button>
                    </p>
                </form>
            
    </div>


    <div class="loop-wrapper">
  <div class="mountain"></div>
  <div class="hill"></div>
  <div class="tree"></div>
  <div class="tree"></div>
  <div class="tree"></div>
  <div class="rock"></div>
  <div class="truck"></div>
  <div class="wheels"></div>
</div> 


<!--Footer-->
<?php include(APP_PATH."libs-user/footer.php"); ?>
<!--/Footer-->
</div>


</body>
</html>	