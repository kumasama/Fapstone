<?php
	require_once('functions.php');
	if(count($_GET) > 0) {
		$garage_id = $_GET['garage_id'];
		$garage_item_id = $_GET['garage_item_id'];
		if(deleteById($garage_item_id, 'garage_items')) {
			header('Location: ../garage_sale_items.php?garage_id=' . $garage_id);
			exit();
		}
	}
?>