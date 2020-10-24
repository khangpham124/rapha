<?php /* Template Name: Location page */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(APP_PATH."libs/head.php");
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/slick.css" media="all">
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/animate.css" media="all">
</head>

<body id="location_page" class="<?php echo $lang_web; ?>">
<?php include(APP_PATH."libs/pageload.php"); ?>

<!--===================================================-->

    <!--Header-->
    <?php include(APP_PATH."libs/header.php"); ?>
    <!--/Header-->

    <section class="about-section">
        <div class="about-section-wrap wow fadeInUp">
            <div class="container">
                <h2 class="header-page"><?php echo ${'lang_'.$lang_web}['text']['location'] ?></h2>
                <div class="flex-box flex-box--between mt--50 wrap-map flex-box--wrap--mb">
                    <div id="controls" class="grid--30 grid__mb--100"></div>
                    <div id="gmap-menu" class="grid--70 grid__mb--100"></div>
                </div>
            </div>
        </div>
    </section>

    

    <!--Footer-->
    <?php include(APP_PATH."libs/footer.php"); ?>
    <!--/Footer-->

    <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7&key=AIzaSyBV7fW4OF5FqFFlLakpTOvf1Kuq_qHXcqY"></script>
    <script src="<?php echo APP_ASSETS; ?>js/maplace.js"></script>
    <script>
        var LocsA = [
        <?php
            $wp_query = new WP_Query();
            $param = array (
            'posts_per_page' => '-1',
            'post_type' => 'store',
            'post_status' => 'publish',
            'order' => 'DESC',
            );
            $wp_query->query($param);
            if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
            $location = explode(',',get_field('coordinates'));
        ?>
        {
        lat: <?php echo $location[0]; ?>,
        lon: <?php echo $location[1]; ?>,
        title: '<?php the_title(); ?><em><?php echo get_field('address'); ?></em><p><?php echo get_field('phone_number'); ?></p>',
        html: '<?php echo get_field('address'); ?>',
        icon: '<?php echo APP_ASSETS; ?>img/top/pin.png',
        animation: google.maps.Animation.DROP
        },
        <?php endwhile;endif; ?>
        ];

        new Maplace({
            locations: LocsA,
            map_div: '#gmap-menu',
            controls_type: 'list',
            zoom: 10,
            controls_on_map: false
        }).Load(); 
        var lang = readCookie('lang_web');
        if(lang =='vn') {
            $('#ullist_a_all').text('Tất cả');
        } else {
            $('#ullist_a_all').text('View all');
        }
    </script>
</body>
</html>	