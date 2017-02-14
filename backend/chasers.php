<?php
	
	require_once('functions.php');

	if(isset($_GET['function'])) {
		switch(strtolower($_GET['function'])) {
			case 'insert':
				if(isset($_POST['json'])) {
					$data = (array)json_decode($_POST['json']);
					if(insert($data, 'chasers')) {
						echo 'Success';
					} else {
						echo 'Failed';
					}
				}
				break;
			case 'checkexisting':
				if(count($_POST)>0) {
					$data = $_POST;
					if(checkExisting($data, 'chasers')) {
						echo 'Data is present!';
					} else {
						echo 'Data is not yet present!';
					}
				}
				break;
		}
	}

	// $arr = array(
	// 	'username' => 'kumataro',
	//     'password' => '131322Clear',
	//     'email' => 'kumaaa.sama@gmail.com',
	//     'last_name' => 'Kuma',
	//     'first_name' => 'Sama',
	//     'birthdate' => '2003-3-1'
 //    );

 //    $data = splitArr($arr);

 //    print_r($data);

 //    echo '<br />';

 //    echo insertSQL($data[0], 'chasers');

 //    insert($arr, 'chasers');

 //    //echo insert($arr, 'chasers');
?>