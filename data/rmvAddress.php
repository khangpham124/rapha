<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$key = $_POST['indexKey'];
		$pid = $_POST['idUser'];
		

		// this gets the repeater and all rows in an array
		$repeater = get_field('address', $pid);

		// get the first row
		$addressRmv = $repeater[$key];
		unset($repeater[$key]);
		array_values($repeater);
		update_field('address', $repeater, $pid);
?>