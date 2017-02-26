<?php
	require_once('functions.php');

	if(count($_GET)>0) {
		echo (checkExisting($_GET, 'chasers'))?'1':'0';
	}
?>