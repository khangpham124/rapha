<?php /* Template Name: Login */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs-user/redirect.php");
?>
</head>

<body id="login" class="dashboard">
<div id="wrapper" class="login">
    <div class="login-box">
        <p class="taC"><img src="<?php echo APP_ASSETS ?>img/header/logo.svg"></p>
        <!-- <h2 class="dashboard-h2 dashboard-text--center">Login</h2> -->
            <form method="post" action="<?php echo APP_URL; ?>data/checklog.php" class="mt--20">
                <div class="login-box-form">
                    <input type="text" id="username" name="username" value="" placeholder="Your email" class="for-login">
                    <input type="text" id="resetpass" name="resetpass" value="" placeholder="Input your email" class="for-reset js-input-reset">
                    <input type="password" id="password" name="password" value="" placeholder="Your password" class="for-login">
                </div>
                <p class="text-red mt--10 taC" id="errLogin"></p>
                <p class="taC mt--20 for-login">
                    <a href="javascript:void(0)" class="dashboard-btn js-btn-login">LOGIN</a>
                </p>
                <p class="taC mt--20 for-reset">
                    <a href="javascript:void(0)" class="dashboard-btn js-btn-reset disable">RESET PASSWORD</a>
                </p>
                <input type="hidden" id="actionURL" value="<?php echo APP_URL; ?>data/checklog.php">
                <p class="taC"><a href="javascript:void(0)" class="text-link mt--20 for-login js-to-reset ">Forget password ?</a></p>
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

<script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/login.js"></script

</body>
</html>	