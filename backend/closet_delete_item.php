<?php
	
	require_once('functions.php');

	if(count($_GET)>0) {
		if(deleteById($_GET['id'], 'closet_items')) {
			header('Location: ../closets.php');
			exit();
		} else {
			echo 'Something went wrong!';
		}
	}
?>