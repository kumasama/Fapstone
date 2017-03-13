<?php
	require_once('functions.php');

	if(isset($_GET['garage_id'])) {
		$garage_id = $_GET['garage_id'];
	} else {
		header('location: ../garage_sales.php');
		exit();
	}

	foreach($_POST['items'] as $item_id) {
		$data = array('garage_id'=> $garage_id,
						'item_id' => $item_id);
		insert($data, 'garage_items');
	}

	header('location: ../garage_sale_items.php?garage_id=' . $garage_id);
	exit();
?>