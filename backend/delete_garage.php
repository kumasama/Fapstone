<?php
	require_once('functions.php');
	if(count($_GET) > 0) {
		$garage_id = $_GET['garage_id'];
		if(deleteById($garage_id, 'garage_sales')) {
			header('location: ../garage_sales.php');
			exit();
		}
	}
?>