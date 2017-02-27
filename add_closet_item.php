<?php
	require_once('backend/functions.php');
	if(count($_GET) > 0) {
		$closet_id = $_GET['closet_id'];
		$item_id = $_GET['item_id'];
		$closet_item = array(
			'closet_id' => $closet_id,
			'item_id' => $item_id
		);
		if(!checkExisting(array('item_id'=>$item_id), 'closet_items')) {
			if(insert($closet_item, 'closet_items')) {
				header('Location: closet_items_add.php?closet_id=' . $closet_id);
				exit();
			}
		}
		else {
			header('Location: closet_items_add.php?closet_id=' . $closet_id);
			exit();
		}
	}
?>