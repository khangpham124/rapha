<?php
add_theme_support('post-thumbnails');
//login logo
function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important; }</style>';
}

add_action('login_head', 'custom_login_logo');


//timthumb
define('THEME_DIR', get_template_directory_uri());
/* Timthumb CropCropimg */
function thumbCrop($img='', $w=false, $h=false, $zc=1){
    if($h)
        $h = "&amp;h=$h";
    else
        $h = "";
        
    if($w)
        $w = "&amp;w=$w";
    else
        $w = "";
    $img = str_replace(get_bloginfo('url'), '', $img);
    $image_url = THEME_DIR . "/timthumb/timthumb.php?src=" . $img . $h . $w ;
    return $image_url;

}
$image_cache = THEME_DIR . "/php/cache/";
// chmod($image_cache, 0777);


function custom_admin_footer() {
    echo 'Develop by Teddycoder';
}
add_filter('admin_footer_text', 'custom_admin_footer');


//sample

add_action('init', 'my_custom_booking');
function my_custom_booking()
{
  $labels = array(
    'name' => _x('Booking', 'post type general name'),
    'singular_name' => _x('Booking', 'post type singular name'),
    'add_new' => _x('Add Booking', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit Booking'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('Not found'),
    'not_found_in_trash' => __('Not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'menu_icon'   => 'dashicons-text-page',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('booking',$args);
}

add_action('init', 'my_custom_store');
function my_custom_store()
{
  $labels = array(
    'name' => _x('Store', 'post type general name'),
    'singular_name' => _x('Store', 'post type singular name'),
    'add_new' => _x('Add Store', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit Store'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('Not found'),
    'not_found_in_trash' => __('Not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'menu_icon'   => 'dashicons-store',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('store',$args);
}


add_action('init', 'my_custom_agency');
function my_custom_agency()
{
  $labels = array(
    'name' => _x('Agency', 'post type general name'),
    'singular_name' => _x('Agency', 'post type singular name'),
    'add_new' => _x('Add Agency', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit Agency'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('Not found'),
    'not_found_in_trash' => __('Not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'menu_icon'   => 'dashicons-groups',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('agency',$args);
}

add_action('init', 'my_custom_product');
function my_custom_product()
{
  $labels = array(
    'name' => _x('Product', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add Product', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit Product'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('Not found'),
    'not_found_in_trash' => __('Not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'menu_icon'   => 'dashicons-screenoptions',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('product',$args);
}


add_action ('init','create_productcat_taxonomy','0');
function create_productcat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('productcat','post type general name'),
	'singular_name' => _x('productcat','post type singular name'),
	'search_items' => __('productcat'),
	'all_items' => __('productcat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Product Categories'),
	'add_new_item' => __('Add new'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'productcat' )
	);
	register_taxonomy('productcat','product',$args);
}


// Deal with images uploaded from the front-end while allowing ACF to do it's thing
function my_acf_pre_save_post($post_id) {

  if ( !function_exists('wp_handle_upload') ) {
  require_once(ABSPATH . 'wp-admin/includes/file.php');
  }
  
  // Move file to media library
  $movefile = wp_handle_upload( $_FILES['my_image_upload'], array('test_form' => false) );
  
  // If move was successful, insert WordPress attachment
  if ( $movefile && !isset($movefile['error']) ) {
  $wp_upload_dir = wp_upload_dir();
  $attachment = array(
  'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
  'post_mime_type' => $movefile['type'],
  'post_title' => preg_replace( '/\.[^.]+$/', ”, basename($movefile['file']) ),
  'post_content' => ”,
  'post_status' => 'inherit'
  );
  $attach_id = wp_insert_attachment($attachment, $movefile['file']);
  
  // Assign the file as the featured image
  set_post_thumbnail($post_id, $attach_id);
  update_field('my_image_upload', $attach_id, $post_id);
  
  }
  
  return $post_id;
  
  }
  
  
  add_filter('acf/pre_save_post' , 'my_acf_pre_save_post');


function get_keys_for_duplicate_values($my_arr, $clean = false) {
  if ($clean) {
      return array_unique($my_arr);
  }

  $dups = $new_arr = array();
  foreach ($my_arr as $key => $val) {
    if (!isset($new_arr[$val])) {
       $new_arr[$val] = $key;
    } else {
      if (isset($dups[$val])) {
         $dups[$val][] = $key;
      } else {
         $dups[$val] = array($key);
         // Comment out the previous line, and uncomment the following line to
         // include the initial key in the dups array.
         // $dups[$val] = array($new_arr[$val], $key);
      }
    }
  }
  return $dups;
}

function wmpudev_enqueue_icon_stylesheet() {

  wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
  
  wp_enqueue_style( 'fontawesome');
  
  }
  add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );


add_action( 'init', 'add_product_endpoint');
function add_product_endpoint(){
    global $wp_post_types;
    $wp_post_types['product']->show_in_rest = true;
    $wp_post_types['product']->rest_base = 'product';
    $wp_post_types['product']->rest_controller_class = 'WP_REST_Posts_Controller';
}