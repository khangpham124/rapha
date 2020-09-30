<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(LOAD_PATH."wp-load.php"); 
$search_term =$_POST['suggest'];
if($search_term != '' ) {
?>
<li>
<ul>
<?php 
        $wp_query = new WP_Query();
        $param = array (
        'posts_per_page' => '-1',
        'post_type' => 'product',
        'post_status' => 'publish',
        'order' => 'DESC',	
        's' => $search_term,		
    );
                
    $wp_query->query($param);
    if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
?>
    <li class="flex-box flex-box--between">
        <p class="grid--35"><strong><?php echo $post->post_title; ?></strong></p>
        <p class="grid--15"><?php echo get_field('package'); ?></p>
        <p class="grid--10"><?php echo get_field('unit'); ?></p>
        <p class="list-products-price grid--10"><?php echo get_field('price'); ?></p>
        <div class="list-products-quantity grid--15">
            <button class="js-button asc" rel="asc"><i class="fa fa-minus" aria-hidden="true"></i></button>
            <input type="number" class="quantity input-page" value="0">
            <button class="js-button desc" rel="desc"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        <p class="grid--15 list-products-button"><a href="javascript:void(0)" class="btn-page addToCard" data-id="<?php echo $post->ID; ?>" data-title="<?php echo $post->post_title; ?>">Add to cart</a></p>
    </li>
<?php endwhile; endif; ?>
</ul>
</li>
<?php } else { ?>
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
                <input type="number" class="quantity input-page" value="0">
                <button class="js-button desc" rel="desc"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
            <p class="grid--15 list-products-button"><a href="javascript:void(0)" class="btn-page addToCard" data-id="'.$post->ID.'" data-title="'.$post->post_title.'">Add to cart</a></p>
            </li>';
        endwhile;endif;
    ?>
        </ul>
    </li>
<?php        
        endforeach;
?>
<?php } ?>