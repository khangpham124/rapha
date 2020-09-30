<?php
include($_SERVER["DOCUMENT_ROOT"] . "/rapha/app_config.php");
include(LOAD_PATH."/wp-load.php");
		$address = $_POST['address'];
		$pid = $_POST['idUser'];
		$orderDate = $_POST['orderDate'];
		$noted = $_POST['noted'];
		$orderDate = $_POST['orderDate'];

		$IDBooking = 'RAP'. $pid .($rand(10,100));

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
        // header('Location:'.APP_URL);
		return 1;
		
?>