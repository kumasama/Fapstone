<?php
	require_once('functions.php');
	if(count($_GET) > 0) {
		$closet_id = $_GET['closet_id'];
		$closet_items = fetchClosetItems($closet_id);
		foreach($closet_items as $closet_item) {
			deleteById($closet_item['id'], 'closet_items');
		}
		if(deleteById($closet_id, 'closets')) {
			header('location: ../closets.php');
			exit();
		}
	}
?>