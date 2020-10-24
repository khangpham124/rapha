<?php
echo $_SERVER["DOCUMENT_ROOT"];
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(APP_PATH."libs/head.php");
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/slick.css" media="all">
</head>

<body id="top">
<!--===================================================-->

    <!--Header-->
    <?php include(APP_PATH."libs/header.php"); ?>
    <!--/Header-->

    <section id="main-visual">
        <img src="<?php echo APP_ASSETS; ?>img/top/main.jpg" class="img-max">
    </section>
    <section id="about-us" class="about-section">
        <div class="about-section-wrap">
            <div class="container">
                <h2 class="header-page">About Us</h2>
                <h3 class="header-page-sub">“Stay focused on the end goal until you succeed.”</h3>
                <div class="section-text section-text--blur grid--80">
                RAPHA TEA  originated from an instant inspiration of discovering the best ingredients from the beautiful island – Taiwan. In 2017, with this spark of inspiration, we opened our first tea shop. RAPHA TEA is proud to offer a full range of premium teas! Farmed and hand picked from the high mountains of Taiwan, each cup of tea we’ve created has a unique aroma, taste and character. We firmly believe the best tea needs the best ingredients, and we want to bring all the goodness to you     by breathing a new life into the traditional tea culture.
                </div>
            </div>
        </div>
    </section>

    <section id="mission" class="mission-section flex-box flex-box--right flex-box--aligncenter">
        <div class="mission-section__leaf"><img src="<?php echo APP_ASSETS; ?>img/top/leaf_stroke.png" ></div>
        <div class="grid--48 mission-section__img"><img src="<?php echo APP_ASSETS; ?>img/top/img_mission.jpg" class="img-max"></div>
        <p class="mission-section-grid"></p>
        <div class="container">
            <div class="grid--45">
                <h2 class="header-page">OUR<br>MISSION</h2>
                <h3 class="header-page-sub">Offering the Best</h3>
                <div class="section-text section-text--blur">
                    <p>
                        Accomplishment starts from action. There is an expression that goes “One minute on the stage, ten years of practice off the stage.” We did our best and never compromised on the idea of freshly brewed tea. It’s our pleasure to share the best tea with you. Serving the best drink is our faith for now and forever.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="menu-section">
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
                    <ul id="cat_<?php echo $slug; ?>" <?php if($slug != 'flavored-tea') { ?>class="flex-box"<?php } ?>>
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
                        <li class="<?php if($slug != 'flavored-tea') { ?>grid--25<?php } ?>">
                            <?php if($thumb_url) { ?>
                            <p class="<?php if($i%3==1) { ?>mt--0 <?php } ?><?php if(($i==2)||($i%2==1)&&($i>1)) {?>mt--60<?php } ?> <?php if(($i%3 == 0)&&($i > 1)) {?>mt--120<?php } ?>"><img src="<?php echo $thumb_url[0]; ?>" alt="" ></p>
                            <?php } ?>
                            <p><?php if($slug != 'flavored-tea') { ?><i class="fa fa-leaf" aria-hidden="true"></i><?php } ?><?php the_title(); ?></p>
                        </li>
                        <?php endwhile;endif; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="taC mt--50"><a href="" class="btn-page">DISCOVER MENU</a></p>
        </div>    
    </section>

    <section id="location" class="location-section" >
        <div class="location-section-wrap">
            <div class="container">
                <h2 class="header-page">Locations</h2>
                <h3 class="header-page-sub">Lorem ipsum dolor sit amet</h3>
                <div class="section-text grid--60">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit eros Leo, nec aliquam nunc mattis imperdiet. Duis luctus dolor a eros vulputate aliquam. Donec a ligula ut dui lacinia mattis nec eu quam. Ut vitae pretium mauris, ac sagittis diam. Donec tempus, leo ac ornare efficitur, dui ante auctor nisi, eget ultrices orci orci vel velit. Donec ultricies gravida tellus vel rhoncus. Maecenas tristique dapibus sem, quis sagittis dui maximus tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi.
                </div>
                <a href="" class="btn-page">SEE MORE</a>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-section-wrap">
                <div class="container flex-box flex-box--between">
                    <div class="grid--40"><img src="<?php echo APP_ASSETS; ?>img/top/img_cup_footer.png" ></div>
                    <div class="contact-section-form grid--55">
                        <h2 class="header-page">Contact</h2>
                        <form>
                            <table class="table-form-page">
                                <tr>
                                    <th>Your name</th>
                                    <td><input class="input-page" value="" id="name" type="text"></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input class="input-page" value="" id="email" type="email"></td>
                                </tr>
                                <tr>
                                    <th>Phone number</th>
                                    <td><input class="input-page" value="" id="phone" type="phone"></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><input class="input-page" value="" id="address" type="address"></td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td><textarea class="textarea-page" id="message"></textarea></td>
                                </tr>
                            </table>
                            <div class="taR">
                                <button class="btn-page">SEND<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>


    <!--Footer-->
    <?php include(APP_PATH."libs/footer.php"); ?>
    <!--/Footer-->
        
    <script src="<?php echo APP_ASSETS; ?>js/vivus.js"></script>
    <script>
        // var st0 = document.querySelectorAll('.st0');
        // var animation_shape = function(){
        // new Vivus('svg-animation-shape', {type: 'scenario-sync',duration: 12,forceRender: false ,animTimingFunction:Vivus.EASE},function(){
        //     setTimeout(function(){
                
        //         for(var i =0;i < st0.length; i ++)
        //             st0[i].removeAttribute('style');
        //         animation_shape();
        //     },10000000000)
        // });        
        // }
        // animation_shape();
    </script>

</body>
</html>	