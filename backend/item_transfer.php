<?php
	require_once('functions.php');

	if(count($_POST)>0) {
		$from_closet_id = $_POST['from_closet_id'];
		$to_closet_id = $_POST['to_closet_id'];
		$items = $_POST['items'];
		foreach($items as $item_id) {
			transfer_item($item_id, $to_closet_id);
		}

		header('location: ../closet_items.php?closet_id=' . $from_closet_id);
		exit();
	}

	function transfer_item($item_id, $closet_id) {
		try {
			$db = PDO_Connection();
			$sql = 'update closet_items set closet_id=? where item_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($closet_id, $item_id));
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
?>