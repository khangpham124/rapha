<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
include(APP_PATH."libs-user/footer.php");
$username = $_POST['username'];
$pw = md5($_POST['password']);
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
			$fullname = get_field('fullname');
			$pass_real = get_field('password');
			if($pass_real==$pw) {
				$token = get_field('token');
				if($token == '') {
					update_field('token', generateRandomString() , $userID);
				}
				// setcookie('login_cookies', $username, time() + (86400 * 30), "/");
				// setcookie('name_cookies', $fullname, time() + (86400 * 30), "/");
				?>
				<script>
				createCookie('login_cookies', '<?php echo $username; ?>',30);
				</script>
				<?php
				
				echo "<script>window.location.href='".APP_URL_USER."';</script>";
			}
			else {
				echo "<script>window.location.href='".APP_URL."login';</script>";
			}
		endwhile;
	} else {
		echo "<script>window.location.href='".APP_URL."login';</script>";
	}
?>

