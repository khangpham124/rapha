<?php
include($_SERVER["DOCUMENT_ROOT"] . "/amario/app_config.php");
include(APP_PATH."libs/head.php");
// include(APP_PATH."libs/checklog.php");
// if(!$_COOKIE['login_cookies']) {    
// 	header('Location:'.APP_URL.'login');
// }
// if($_COOKIE['role_cookies']=='room') {
//     // echo '<meta http-equiv="refresh" content="10" >';
// }

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body id="top">
<!--===================================================-->

    
    <!--===================================================-->
        <!--Header-->
        <?php include(APP_PATH."libs/header.php"); ?>
        <!--/Header-->

<section class="header-page header-page__services">
	<div class="header-page--inner">
        <div class="container">
            <div class="section-head-text">
                <p class="section-sub-title">SERVICES</p>
                <h2 class="section-title">Dịch vụ</h2>
            </div>
        </div>
	</div>
</section>

        <div class="container">
            <ul class="flex-box flex-box--between list-services">
                <?php
                    $wp_query = new WP_Query();
                    $param = array (
                    'posts_per_page' => '-1',
                    'post_type' => 'services',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    );
                    $wp_query->query($param);
                    if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
                ?>
                <li><?php echo $post->post_title; ?>
                    <a href="javascript:void(0)" class="btn js-booking" data-chose="<?php echo $post->post_title; ?>" data-services="<?php echo $post->ID; ?>">Book</a>
                </li>
                <?php endwhile;endif; ?>
            </ul>

            <div class="booking-form mt--30" id="bookingSection">
                <form action="" method="POST" id="formCustomer">
                    <table class="tbl-page" cellspacing="0">
                        <tr>
                            <th>Họ tên</th>
                            <td><input type="text" id="name" name="name" class="input-page" value="<?php if(isset($_COOKIE['name_cookies'])) { echo $_COOKIE['name_cookies']; } ?>"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><input type="text" id="phone" name="phone" class="input-page" value="<?php if(isset($_COOKIE['phone_cookies'])) { echo $_COOKIE['phone_cookies']; } ?>"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="text" id="email" name="email" class="input-page" value="<?php if(isset($_COOKIE['login_cookies'])) { echo $_COOKIE['login_cookies']; } ?>"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" id="address" name="address" class="input-page" value=""></td>
                        </tr>
                    </table>
                    <ul id="list-question" class="listStep"></ul>
                    <a href="javascript:void(0)" class="js-prev btn">Prev</a>
                    <a href="javascript:void(0)" class="js-next btn">Next</a>
                    
                    <p id="detail"></p>
                    <input type="hidden" name="service" id="service" value="">
                    <input type="hidden" name="content" id="content" value="">
                    <a href="javascript:void(0)" class="btnSubmit btn js-get-booking" name="submit" data-action="<?php echo APP_URL; ?>data/addBooking.php">BOOK</a>
                </form>
            </div>


            <h2 class="section-title">List Booking</h2>
            <?php if (!isset($_COOKIE['login_cookies'])) { ?>
                <form action="" method="POST" id="form-login">
                    <input type="email" name="email_login" id="email_login" class="input-page" placeholder="email">
                    <input type="password" id="password-login" name="password" class="input-page" placeholder="password">
                    <a href="javascript:void(0)" data-action="<?php echo APP_URL; ?>data/login.php" class="btnSubmit btn js-login">Login</a>
                </form>
                <p class="error"></p>
            <?php } ?>

            <div class="listBooking <?php if (isset($_COOKIE['login_cookies'])) { ?>block<?php } ?>">
                <table class="tbl-page" cellspacing="0">
                        <?php
                        if($_COOKIE['login_cookies']) {
                            $emailCookies = $_COOKIE['login_cookies'];
                            $wp_query = new WP_Query();
                            $param = array (
                            'posts_per_page' => '-1',
                            'post_type' => 'booking',
                            'post_status' => 'publish',
                            'order' => 'DESC',
                            'paged' => $paged,
                            'meta_query' => array(
                                array(
                                'key' => 'email',
                                'value' => $emailCookies,
                                'compare' => '='
                                ))
                            );
                            $wp_query->query($param);
                            if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();                        
                        ?>
                        <tr>
                            <td><?php the_title(); ?></td>
                            <td><?php echo get_field('status') ?></td>
                        </tr>
                        <?php endwhile;endif; ?>
                        <?php  } ?>
                </table>
            </div>
            
            
        </div>
        


        <!--Footer-->
        <?php include(APP_PATH."libs/footer.php"); ?>
        <!--/Footer-->
        

</body>
</html>	