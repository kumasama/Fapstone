<?php
	
	require_once('functions.php');

	if(count($_GET)>1) {
		$data = array(
			'closet_id' => $_GET['closet_id'],
			'item_id' => $_GET['item_id']
		);
		if(insert($data, 'closet_items')) {
			header('Location: ../items.php');
			exit();
		}
		else {
			echo 'Something went wrong!';
		}
	}
?>