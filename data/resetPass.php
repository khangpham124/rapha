<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
	$token = $_GET['token'];
	$pid = $_GET['user'];
?>
	<p class="taC"><img src="<?php echo APP_ASSETS ?>img/header/logo.svg" width="200"></p>
	<form action="" method="POST">
		<p>Reset your password</p>
		<input type="password" id="password" name="password" value="" placeholder="New password" >
		<input type="password" id="re-password" name="re-password" value="" placeholder="Re-type password"">
		<button>Reset</button>
	</form>
<?php
	if($_POST['password']!='') {
		if($token == get_field('token',$pid)) {
			$password = md5($_POST['password']);
			$repassword = md5($_POST['re-password']);
			if($password == $repassword) {
				update_field('password', $password, $pid);
				echo "Change password success";
				echo "<script>window.location.href='".APP_URL."login';</script>";
			} else {
				echo "password not match";
			}
		}
	}
?>