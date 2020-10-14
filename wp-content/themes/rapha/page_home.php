<?php /* Template Name: Home page */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs/head.php");
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/slick.css" media="all">
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/animate.css" media="all">
</head>

<body id="top" class="<?php echo $lang_web; ?>">
<?php include(APP_PATH."libs/pageload.php"); ?>

<!--===================================================-->

    <!--Header-->
    <?php include(APP_PATH."libs/header.php"); ?>
    <!--/Header-->

    <section id="main-visual">
        <ul class="slide-container">
            <li id="slide_default">
                <img src="<?php echo APP_ASSETS; ?>img/top/main.jpg" class="img-max main-img">
                <img src="<?php echo APP_ASSETS; ?>img/top/txt_love.svg" class="txt-love">
                <img src="<?php echo APP_ASSETS; ?>img/top/main-cup_tea.png" class="main-cup-tea">
            </li>
            <?php
                while(has_sub_field('slider')):
                $image = wp_get_attachment_image_src(get_sub_field('image'),'full');
            ?>
            <li><img src="<?php echo $image[0]; ?>" class="img-max main-img"></li>
            <?php endwhile; ?>
        </ul>
    </section>
    <section id="about-us" class="about-section">
        <div class="about-section-wrap wow fadeInUp">
            <div class="container">
                <h2 class="header-page"><?php echo ${'lang_'.$lang_web}['text']['about'] ?></h2>
                <?php
                $title_about_en = get_field('title');
                $title_about_vn = get_field('title_vn'); 

                $content_about_en = get_field('content');
                $content_about_vn = get_field('content_vn'); 
                ?>
                <h3 class="header-page-sub"><?php echo ${'title_about_'.$lang_web}; ?></h3>
                <div class="section-text section-text--blur grid--80 grid__mb--100">
                <?php echo ${'content_about_'.$lang_web}; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="mission-section" class="mission-section flex-box flex-box--right flex-box--aligncenter flex-box--wrap--mb">
        <div class="mission-section__leaf"><img src="<?php echo APP_ASSETS; ?>img/top/leaf_stroke.png" ></div>
        <?php
            $title_mission_en = get_field('title_mission');
            $title_mission_vn = get_field('title_mission_vn'); 

            $content_mission_en = get_field('content_mission');
            $content_mission_vn = get_field('content_mission_vn'); 
            $image_misson = wp_get_attachment_image_src(get_field('thumbnail'),'full');
        ?>
        <div class="grid--48 mission-section__img grid__mb--100"><img src="<?php echo $image_misson[0]; ?>" class="img-max wow fadeIn"></div>
        <p class="mission-section-grid pc"></p>
        <div class="container">
            <div class="grid--45 wow fadeInRight grid__mb--100">
                <h2 class="header-page"><?php echo ${'lang_'.$lang_web}['text']['our-mission'] ?></h2>
                <h3 class="header-page-sub"><?php echo ${'title_mission_'.$lang_web}; ?></h3>
                <div class="section-text section-text--blur">
                    <p>
                    <?php echo ${'content_mission_'.$lang_web}; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="menu-section" class="menu-section">
        <div class="menu-section__top"><img src="<?php echo APP_ASSETS; ?>img/top/bg_leaf.png" ></div>
        <div class="menu-section__bottom"><img src="<?php echo APP_ASSETS; ?>img/top/img_leaf_bottom.png" ></div>
        <div class="menu-section-wrap">
            <h2 class="header-page taC">Menu</h2>
            <div class="container">
                <div class="menu-section-wrap-list">
                    <ul class="menu-section-list">
                        <?php
                            $args=array(
                            'post_type' => 'menus',
                            'child_of' => 0,
                            'orderby' =>'ID',
                            'order' => 'ASC',
                            'hide_empty' => 0,
                            'taxonomy' => 'menuscat',
                            'number' => '0',
                            'pad_counts' => false
                            );
                            $categories = get_categories($args);
                            foreach ( $categories as $category ):
                            $slug = $category->slug;
                        ?>
                        <li><a href="javascript:void(0)" class="js-tab-item" data-tab="<?php echo $slug; ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <?php
                    $i = 0;
                    $args=array(
                    'post_type' => 'menus',
                    'child_of' => 0,
                    'orderby' =>'ID',
                    'order' => 'ASC',
                    'hide_empty' => 1,
                    'taxonomy' => 'menuscat',
                    'number' => '0',
                    'pad_counts' => false
                    );
                    $categories = get_categories($args);
                    foreach ( $categories as $category ):
                    $slug = $category->slug;
                ?>
                    <div class="menu-section-tab" id="<?php echo $slug; ?>">
                    <ul id="cat_<?php echo $slug; ?>" <?php if($slug != 'flavored-tea') { ?>class="flex-box flex-box--wrap"<?php } ?>>
                        <?php
                            $wp_query = new WP_Query();
                            $param=array(
                            'post_type'=>'menus',
                            'order' => 'DESC',
                            'posts_per_page' => '-1',
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'menuscat',
                            'field' => 'slug',
                            'terms' => $slug
                            )
                            )
                            );
                            $wp_query->query($param);
                            if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
                            $thumbnail = get_post_thumbnail_id($post->ID);
                            $thumb_url = wp_get_attachment_image_src($thumbnail,'full');
                            $i++;
                        ?>
                        <li class="<?php if($slug != 'flavored-tea') { ?>grid--25 mt--25<?php } ?>">
                            <?php if($thumb_url) { ?>
                            <p class="mt__mb--0 <?php if($i%3==1) { ?>mt--0 <?php } ?><?php if(($i==2)||($i%2==1)&&($i>1)) {?>mt--60<?php } ?> <?php if(($i%3 == 0)&&($i > 1)) {?>mt--120<?php } ?>"><img src="<?php echo $thumb_url[0]; ?>" alt="" ></p>
                            <?php } ?>
                            <p><?php if($slug != 'flavored-tea') { ?><i class="fa fa-leaf" aria-hidden="true"></i><?php } ?><?php the_title(); ?></p>
                        </li>
                        <?php endwhile;endif; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="taC mt--50"><a href="" class="btn-page"><?php echo ${'lang_'.$lang_web}['text']['discover'] ?></a></p>
        </div>    
    </section>
    <?php wp_reset_query(); ?>

    <section id="location-section" class="location-section" >
        <div class="location-section-wrap wow fadeInUp">
            <div class="container">
                <h2 class="header-page"><?php echo ${'lang_'.$lang_web}['text']['location'] ?></h2>
                <?php
                $title_location_en = get_field('title_location');
                $title_location_vn = get_field('title_location_vn'); 
                $content_location_en = get_field('content_location');
                $content_location_vn = get_field('content_location_vn'); 
                ?>
                <h3 class="header-page-sub"><?php echo ${'title_location_'.$lang_web}; ?></h3>
                <div class="section-text grid--60 grid__mb--100">
                <?php echo ${'content_location_'.$lang_web}; ?>
                </div>
                <a href="<?php echo APP_URL; ?>location" class="btn-page"><?php echo ${'lang_'.$lang_web}['text']['see-more']; ?></a>
            </div>
        </div>
    </section>

    <section id="contact-section" class="contact-section">
        <div class="contact-section-wrap">
                <div class="container flex-box flex-box--between flex-box--wrap--mb">
                    <div class="grid--40 grid__mb--100 wow fadeInLeft pc"><img src="<?php echo APP_ASSETS; ?>img/top/img_cup_footer.png" class="contact-img" ></div>
                    <div class="contact-section-form grid--55 wow fadeInRight grid__mb--100">
                        <h2 class="header-page"><?php echo ${'lang_'.$lang_web}['text']['contact'] ?></h2>
                        <form>
                            <table class="table-form-page">
                                <tr>
                                    <th><?php echo ${'lang_'.$lang_web}['text']['your-name'] ?></th>
                                    <td><input class="input-page" value="" id="name" type="text"></td>
                                </tr>
                                <tr>
                                    <th><?php echo ${'lang_'.$lang_web}['text']['email'] ?></th>
                                    <td><input class="input-page" value="" id="email" type="email"></td>
                                </tr>
                                <tr>
                                    <th><?php echo ${'lang_'.$lang_web}['text']['phone-number'] ?></th>
                                    <td><input class="input-page" value="" id="phone" type="phone"></td>
                                </tr>
                                <tr>
                                    <th><?php echo ${'lang_'.$lang_web}['text']['address'] ?></th>
                                    <td><input class="input-page" value="" id="address" type="address"></td>
                                </tr>
                                <tr>
                                    <th><?php echo ${'lang_'.$lang_web}['text']['message'] ?></th>
                                    <td><textarea class="textarea-page" id="message"></textarea></td>
                                </tr>
                            </table>
                            <div class="taR">
                                <button class="btn-page"><?php echo ${'lang_'.$lang_web}['text']['send'] ?><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>

    <ul class="dot-navi">
        <li id="dot_about"><a href="<?php echo APP_URL; ?>#about-us"></a><p><?php echo ${'lang_'.$lang_web}['menu']['about'] ?></p></li>
        <li id="dot_menu"><a href="<?php echo APP_URL; ?>#menu-section"></a><p><?php echo ${'lang_'.$lang_web}['menu']['menu'] ?></p></li>
        <li id="dot_location"><a href="<?php echo APP_URL; ?>#location-section"></a><p><?php echo ${'lang_'.$lang_web}['menu']['location'] ?></p></li>
        <li id="dot_contact"><a href="<?php echo APP_URL; ?>#contact-section"></a><p><?php echo ${'lang_'.$lang_web}['menu']['contact'] ?></p></li>
    </ul>

    <!--Footer-->
    <?php include(APP_PATH."libs/footer.php"); ?>
    <!--/Footer-->
        
    <script src="<?php echo APP_ASSETS; ?>js/vivus.js"></script>
    <script type="text/javascript" src="<?php echo APP_ASSETS; ?>js/dotnavi.js"></script>
</body>
</html>	