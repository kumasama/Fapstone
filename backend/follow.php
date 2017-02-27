<?php
	require_once('functions.php');

	$follower_id = $_GET['follower_id'];
	$following_id = $_GET['following_id'];

	$data = array('follow_id' => $following_id,
					'chaser_id' => $follower_id
				);

	$following = if_Follower($follower_id, $following_id);

	if(!$following) {
		if(insert($data, 'networks')) {
			header('Location: ../profile_view.php?chaser_id=' . $following_id);
			exit();
		}
	} else {
		header('Location: ../profile_view.php?chaser_id=' . $following_id);
		exit();
	}
?>