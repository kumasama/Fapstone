<?php
	
	require_once('functions.php');

	$data = array('username'=>'kumarin');

	$json_arr = array();

	if(checkExisting($data, 'chasers')) {
		echo 'Data is present!';
	} else {
		echo 'Data is not yet present!';
	}
?>