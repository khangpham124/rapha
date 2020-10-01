<?php
error_reporting(0);
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


add_action( 'admin_menu', 'add_orders_menu_bubble' );
function add_orders_menu_bubble() {
  global $menu;
  $orderStatus = get_posts(array(
    'post_type' => 'booking',
    'posts_per_page' => -1,
    'meta_query' => array(
      array(
        'key' => 'status',
        'value' => 'confirm',
        'compare' => '=',
      )
    ),
  ));
  if ( count($orderStatus) ) {
    foreach ( $menu as $key => $value ) {
      if ( $menu[$key][2] == 'edit.php?post_type=booking' ) {
        $menu[$key][0] .= ' <span class="update-plugins count-1"><span class="plugin-count">' . count($orderStatus) . '</span></span>';
        return;
      }
    }
  }
}

$colorStatusArr = array(
  'confirm' =>array('color'=>'#ffa300','icon'=>'dashicons-clipboard'),
  'progress' =>array('color'=>'#03c73f','icon'=>'dashicons-welcome-write-blog'),
  'cancel' =>array('color'=>'#ff0c0c','icon'=>'dashicons-no'),
  'shipping' =>array('color'=>'#009222','icon'=>'dashicons-admin-tools'),
  'complete' =>array('color'=>'#009222','icon'=>'dashicons-saved'),
);

// CUSTOMER ORDER
add_filter( 'manage_edit-booking_columns', 'my_edit_booking_columns' ) ;
function my_edit_booking_columns( $columns ) {
  $columns = array(
    'cb' => '<input type="checkbox" />',
    'title' => __( 'Title' ),
    'fullname' => __( 'Customer Name' ),
    'email' => __( "User's Mail" ),
    'phone' => __( 'Phone' ),
    'status' => __( 'Booking Status' ),
    'date' => __( 'Date' ),

  );
  return $columns;
}

add_action( 'manage_booking_posts_custom_column', 'my_manage_booking_columns', 10, 2 );
function my_manage_booking_columns( $column, $post_id ) {
  global $post, $colorStatusArr;
  switch( $column ) {
    
    case 'status':
      $orderStatus = get_field('status');
      $field_key = "field_5f732bd24935d";
      $field = get_field_object($field_key);
      if(isset($orderStatus)) {
        echo '<span style="color: '.$colorStatusArr[$orderStatus]['color'].'"><i class="dashicons '.$colorStatusArr[$orderStatus]['icon'].'"></i> '.$field['choices'][$orderStatus].'</span>';
      }
    break;

    case 'phone':
      $cus_name = get_field('phone');
      $field_key = "field_5f7546b3dc245";
      $field = get_field_object($field_key);
      if(isset($cus_name)) {
        echo $field['value'];
      }
    break;

    case 'email':
      $cus_name = get_field('email');
      $field_key = "field_5f7546badc246";
      $field = get_field_object($field_key);
      if(isset($cus_name)) {
        echo $field['value'];
      }
    break;

    case 'fullname':
      $cus_name = get_field('fullname');
      $field_key = "field_5f7546a7dc244";
      $field = get_field_object($field_key);
      if(isset($cus_name)) {
        echo $field['value'];
      }
    break;

  }
  return;
}