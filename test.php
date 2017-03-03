<?php
	require_once('backend/functions.php');

	echo count($_GET['itemz']) . ' items';

	$items = $_GET['itemz'];
	foreach($items as $item) {
		echo '<br />' . $item ;
	}
?>