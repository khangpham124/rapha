<?php /* Template Name: Dashboard */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(APP_PATH."libs-user/head.php");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body id="top" class="dashboard">
    <div id="wrapper">
        <!--Header-->
        <?php include(APP_PATH."libs-user/header.php"); ?>
        <!--/Header-->
        
        <div class="flex-box flex-box--between flex-box--wrap">
        <?php include(APP_PATH."libs-user/sidebar.php"); ?>
            <div class="main-content flex-box flex-box--between">
                <div class="blockPage blockPage--full main-dashboard">
                    
                    <div class="flex-box flex-box--between">
                    <h2 class="h2_page">Danh sách sản phẩm</h2>
                        <form id="search-form" class="grid--40">
                            <input class="input-page  js-suggest" type="text" name="suggest" value="" id="suggest" placeholder="Tìm kiếm sản phẩm">
                        </form>
                    </div>
                    <ul class="list-products" id="list-products">
                    <?php 
                        $args=array(
                            'post_type' => 'product',
                            'child_of' => 0,
                            'orderby' =>'ID',
                            'order' => 'ASC',
                            'hide_empty' => 0,
                            'taxonomy' => 'productcat',
                            'number' => '0',
                            'pad_counts' => false
                        );
                            $categories = get_categories($args);
                            foreach ( $categories as $category ):
                            $slug = $category->slug;
                     ?>
                            <li>
                                <h4><a href="javascript:void(0)" class="js-categories"><?php echo $category->name; ?></a></h4>
                            <ul class="js-list-products">
                           <?php 
                           $wp_query = new WP_Query();
                            $param=array(
                            'post_type'=>'product',
                            'order' => 'DESC',
                            'posts_per_page' => '-1',
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'productcat',
                            'field' => 'slug',
                            'terms' => $slug
                            )
                            )
                            );
                            $wp_query->query($param);
                            if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
                                echo '<li class="flex-box flex-box--between">
                                <p class="grid--35"><strong>'.$post->post_title.'</strong></p>
                                <p class="grid--15">'.get_field('package').'</p>
                                <p class="grid--10">'.get_field('unit').'</p>
                                <p class="list-products-price grid--10">'.get_field('price').' $</p>
                                <div class="list-products-quantity grid--15">
                                    <button class="js-button asc" rel="asc"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="number" class="quantity input-page" value="1">
                                    <button class="js-button desc" rel="desc"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                                <p class="grid--15 list-products-button"><a href="javascript:void(0)" class="btn-page addToCard" data-price="'.get_field('price').'" data-id="'.$post->ID.'" data-title="'.$post->post_title.'">Add to cart</a></p>
                                </li>';
                            endwhile;endif;
                        ?>
                            </ul>
                        </li>
                    <?php        
                            endforeach;
                    ?>
                    </ul>
                </div>
                <div class="cart-fixed">
                    <div class="cart-fixed-inner js-cart-fixed-inner">
                        <h2 class="h2_page numbCart bg--grey">Giỏ hàng (<span class="js-numbCart">0</span>)</h2>
                        <ul id='cart-in' class="list-cart"></ul>
                        <p class="taC btn-checkout"><a href="<?php echo APP_URL; ?>checkout" class="btn-page">Checkout</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php include(APP_PATH."libs-user/footer.php"); ?>
        <!--/Footer-->
    </div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
<script>
  $( function() {
    var availableTags = [
    <?php 
    $wp_query = new WP_Query();
    $param = array (
    'posts_per_page' => '-1',
    'post_type' => 'product',
    'post_status' => 'publish',
    'order' => 'DESC',
    );
    $wp_query->query($param);
    if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();    
    ?>
      "<?php echo $post->post_title; ?>",
    <?php endwhile;endif; ?>  
    ];
    $( "#suggest" ).autocomplete({
      source: availableTags
    });
  } );
  </script>    
        
</body>
</html>	