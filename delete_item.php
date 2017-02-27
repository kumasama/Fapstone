<?php
	
	require_once('backend/functions.php');

	if(count($_GET)>0) {
		$item_id = $_GET['item_id'];
		if(deleteById($item_id, 'items')) {
			header('Location: items.php');
			exit();
		}
	}
?>