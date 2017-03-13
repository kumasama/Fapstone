<?php
	require_once('functions.php');

	if(isset($_GET['garage_id'])) {
		$garage_id = $_GET['garage_id'];
	} else {
		header('location: ../garage_sales.php');
		exit();
	}

	if(isset($_POST['chasers'])) {
		$chasers = $_POST['chasers'];
	} else {
		header('location: ../garage_sales.php?garage_id=' . $garage_id);
		exit();
	}

	foreach($chasers as $chaser_id) {
		$data = array('garage_id'=>$garage_id, 'chaser_id'=>$chaser_id);
		insert($data, 'garage_invitations');
	}

	header('location: ../garage_sale_items.php?garage_id=' . $garage_id);
	exit();
?>