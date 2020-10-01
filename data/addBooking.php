<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$address = $_POST['address'];
		$pid = $_POST['idUser'];
		$orderDate = $_POST['orderDate'];
		$noted = $_POST['noted'];
		$orderDate = $_POST['orderDate'];
		$totalPrice = $_POST['totalPrice'];

		$IDBooking = 'RAP'. $pid .rand(10,100);
        $customer_post = array(
            'post_title'    => $IDBooking,
            'post_content'    => $noted,
            'post_status'   => 'publish',
            'post_type' => 'booking',
        );
        $pid = wp_insert_post($customer_post); 
        
        add_post_meta($pid, 'address', $address);
        add_post_meta($pid, 'order_date', $orderDate);
		update_post_meta($pid, 'status', 'confirm');
		update_post_meta($pid, 'userid', $pid);
		update_post_meta($pid, 'note', $noted);
		update_post_meta($pid, 'total', $totalPrice);
		
		$listBooking = array();
		$numberOder = $_POST['numberOder'];
		for($n=0; $n<$numberOder; $n++) {
			$listBooking[$n]['name_pro'] = $_POST['prod_name_'.$n];
			$listBooking[$n]['quantity'] = $_POST['prod_quan_'.$n];
		}
	
        update_field('order_detail', $listBooking, $pid);
?>