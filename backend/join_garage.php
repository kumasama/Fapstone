<?php
	require_once('functions.php');
	if(count($_GET) < 1) {
		header('location: ../notifs.php');
		exit();
	}

	if(insert($_GET, 'garage_chasers')) {
		header('location: ../garage_sale_items.php?garage_id=' . $_GET['garage_id']);
		exit();
	}
?>