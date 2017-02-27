<?php
	require_once('functions.php');

	$follower_id = $_GET['follower_id'];
	$following_id = $_GET['following_id'];

	if(unfollow($follower_id, $following_id)) {
		header('Location: ../profile_view.php?chaser_id=' . $following_id);
		exit();
	}

	function unfollow($follower, $following) {
		$success = false;
		try {
			$db = PDO_Connection();
			$sql = 'delete from networks where follow_id=? and chaser_id=?';
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($following, $follower));
			$db = null;
		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $success;
	}
?>