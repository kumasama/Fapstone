<?php
	require_once('functions.php');
	if(count($_GET) > 0) {
		$garage_id = $_GET['garage_id'];
		delete_garage_items($garage_id);
		delete_garage_invitation($garage_id);
		delete_garage_chasers($garage_id);
		if(deleteById($garage_id, 'garage_sales')) {
			header('location: ../garage_sales.php');
			exit();
		}
	}

	function delete_garage_invitation($garage_id)
	 {
		try {
			$db = PDO_Connection();
			$sql = 'delete from garage_invitations where garage_id=?';
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($garage_id));
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $success;
	}

	function delete_garage_items($garage_id) {
		try {
			$db = PDO_Connection();
			$sql = 'delete from garage_invitations where garage_id=?';
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($garage_id));
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $success;
	}

	function delete_garage_chasers($garage_id) {
		try {
			$db = PDO_Connection();
			$sql = 'delete from garage_chasers where garage_id=?';
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($garage_id));
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $success;
	}
?>