<?php
	session_start();
	
	unset($_SESSION['islogin']);
	unset($_SESSION['chaser_id']);
	
	//kill the user session
	session_destroy();

	header('Location: login.php');
	exit();
?>
