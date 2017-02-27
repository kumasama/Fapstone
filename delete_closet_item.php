<?php
	require_once('backend/functions.php');
	if(count($_GET) > 0) {
		$closet_id = $_GET['closet_id'];
		$closet_item_id = $_GET['closet_item_id'];
		if(deleteById($closet_item_id, 'closet_items')) {
			header('Location: closet_items.php?closet_id=' . $closet_id);
			exit();
		}
	}
?>