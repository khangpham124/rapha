<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/rapha-tea/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$address = $_POST['address'];
		$pid = $_POST['idUser'];

		$currList = get_field('address',$pid);
		
		$newAddress = array();
		if(!$currList) {
			$newAddress[0] = array(
				'address' => $address,
				'main_address' => 'no'
			);
			update_field('address', $newAddress, $pid);
		} else {
			$newAddress = array(
				'address' => $address,
				'main_address' => 'no'
			);
			array_push($currList,$newAddress);
			update_field('address', $currList, $pid);
		}
?>