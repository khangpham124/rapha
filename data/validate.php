<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
$username = $_POST['username'];
	$arr_user = array();
	$wp_query = new WP_Query();
	$param = array (
	's' => $username,	
	'posts_per_page' => '-1',
	'post_type' => 'agency',
	'post_status' => 'publish',
	);
	$wp_query->query($param);
	$numb_result = count($wp_query->query($param));
	if($numb_result > 0) {
		while($wp_query->have_posts()) :$wp_query->the_post();
			$username = $post->post_title;
			$userID = $post->ID;
            $myJSON = json_encode($post);
            echo $myJSON;
		endwhile; 
	} else {
	    echo 'Account does not exist';
	}
?>

