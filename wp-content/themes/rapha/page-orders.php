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
                            <td class="grid--20">Mã đơn hàng</td>
                            <td class="grid--20">Tình trạng</td>
                            <td class="grid--20">Thành tiền</td>
                            <td class="grid--30">Ngày đặt</td>
                            <td class="grid--10">Chi tiết</td>
                        </thead>
                        
                        <tbody>
                    <?php    
                        while($wp_query->have_posts()) :$wp_query->the_post();
                    ?>
                    <tr>
                        <td colspan="5">
                            <div class="flex-box flex-box--between">
                                <p class="grid--20"><?php echo $post->post_title; ?></p>
                                <p class="grid--20"><?php echo get_field('status'); ?></p>
                                <p class="grid--20"><?php echo get_field('total'); ?>$</p>
                                <p class="grid--30"><?php echo get_field('order_date'); ?></p>
                                <p class="grid--10"><a href="javascript:void(0)" class="js-toggle"><i class="fa fa-info-circle" aria-hidden="true"></i></a></p>
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
                    Bạn chưa có đơn hàng nào
                    <?php endif; ?>
                    </tbody>
                    
                </ul>
            </div>    
        </div>
        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>
</body>
</html>	