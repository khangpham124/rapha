<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$password = md5($_POST['password']);
		$pid = $_POST['idUser'];
		update_field('password', $password, $pid);
?>