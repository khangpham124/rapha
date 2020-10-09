<?php /* Template Name: Orders */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs-user/head.php");
?>

</head>

<body id="orders" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content">
                <table class="order-list">
                    <?php
                        $wp_query = new WP_Query();
                        $param = array (
                        'posts_per_page' => '-1',
                        'post_type' => 'booking',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'meta_query' => array(
                            array(
                            'key' => 'userid',
                            'value' => $userID,
                            'compare' => '='
                            ))
                        );
                        $wp_query->query($param);
                        if($wp_query->have_posts()): ?>
                        <thead>
                            <td class="grid--20">Order ID</td>
                            <td class="grid--10">Status</td>
                            <td class="grid--20">Total</td>
                            <td class="grid--20">Order date</td>
                            <td class="grid--20">Last update</td>
                            <td class="grid--30">Action</td>
                        </thead>
                        
                        <tbody>
                    <?php    
                        while($wp_query->have_posts()) :$wp_query->the_post();
                    ?>
                    <tr>
                        <td colspan="5">
                            <div class="flex-box flex-box--between">
                                <p class="grid--20"><?php echo $post->post_title; ?></p>
                                <p class="grid--10"><?php echo get_field('status'); ?></p>
                                <p class="grid--20"><?php echo get_field('total'); ?>$</p>
                                <p class="grid--20"><?php echo get_field('order_date'); ?></p>
                                <p class="grid--20"><?php echo get_field('last_update'); ?></p>
                                <p class="grid--30">
                                    <a href="javascript:void(0)" class="js-toggle"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    <?php if(get_field('status') == 'Processed') { ?>
                                        <a href="javascript:void(0)" data-edit="<?php echo $post->ID; ?>" class="js-cancel-booking btn--outline"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" data-cancel="<?php echo $post->ID; ?>" class="js-cancel-booking btn-page--outline">Cancel Booking</a>
                                    <?php } ?>
                                </p>
                            </div>
                            
                            <div class="order-list-detail">
                                <?php
                                    while(has_sub_field('order_detail')):
                                ?>
                                <div class="grid--50 flex-box flex-box--between">
                                    <p class="grid--40"><?php echo get_sub_field('name_pro'); ?>
                                    <p class="grid--20"><?php echo get_sub_field('price'); ?> $   x   <?php echo get_sub_field('quantity'); ?></p></p>
                                    <p class="grid--30"><?php $price = get_sub_field('price'); $quan= get_sub_field('quantity'); 
                                    echo $total = $price * $quan; 
                                    ?> $</p>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile;
                    else: ?>
                    There are no orders
                    <?php endif; ?>
                    </tbody>
                    
                </ul>
            </div>    
        </div>
        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>

    <div class="popup">
        <form method="post" id="formUpdate">
            <div id="formUpdateContent"></div>
            <input type="hidden" value="<?php echo date("d-m-Y H:i:s"); ?>" name="last_update">
        </form>
    </div>
</body>
</html>	