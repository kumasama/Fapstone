<?php
	
	require_once('functions.php');

	if(count($_GET)>0) {
		$type = $_GET['type'];

		if($type === 'user') {
			$data = array(
					'reported_id' => $_GET['reported_id'],
					'reporter_id' => $_GET['reporter_id']
				);
			if(!user_reported($data)) {
				if(insert($data, 'complaints_user')) {
					echo 'Success!';
				}	
			}

		} else if($type == 'post') {
			$data = array(
					'post_id' => $_GET['post_id'],
					'reporter_id' => $_GET['reporter_id']
				);
			if(!post_reported($data)) {
				if(insert($data, 'complaints_post')) {
					echo 'Success!';
				}	
			}
		}
	}	

	function user_reported($data) {
		$reported = false;
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from complaints_user where reported_id=? and reporter_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($data['reported_id'], $data['reporter_id']));
			$result = $stmt->fetch();
	        if($result[0]>0) {
	        	$reported = true;
	        }
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $reported;
	}

	function post_reported($data) {
		$reported = false;
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from complaints_post where post_id=? and reporter_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($data['post_id'], $data['reporter_id']));
			$result = $stmt->fetch();
	        if($result[0]>0) {
	        	$reported = true;
	        }
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $reported;
	}
?>