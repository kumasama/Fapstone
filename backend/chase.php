<?php
	
	require_once('functions.php');

	if(count($_GET)>0) {
		$chaser_id = $_GET['chaser_id'];
		$post_id = $_GET['post_id'];

		$data = array(
			'post_id' => $post_id,
			'chaser_id' => $chaser_id
		);
		if(!chased($data)) {
			if(insert($data, 'chases')) {
				echo 'Success!';
			}	
		}

	}

	function chased($data) {
		$chased = false;
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from chases where post_id=? and chaser_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($data['post_id'], $data['chaser_id']));
			$result = $stmt->fetch();
	        if($result[0]>0) {
	        	$chased = true;
	        }
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $chased;
	}
?>