<?php
	
	require_once('functions.php');

	if(count($_GET)>0) {
		$chaser_id = $_GET['chaser_id'];
		$post_id = $_GET['post_id'];
		$type = $_GET['type'];

		$data = array(
			'type' => $type,
			'post_id' => $post_id,
			'chaser_id' => $chaser_id
		);
		if(!reacted($data)) {
			if(insert($data, 'reactions')) {
				echo 'Success!';
			}	
		}

	}

	function reacted($data) {
		$reacted = false;
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from reactions where type=? and post_id=? and chaser_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($data['type'], $data['post_id'], $data['chaser_id']));
			$result = $stmt->fetch();
	        if($result[0]>0) {
	        	$reacted = true;
	        }
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $reacted;
	}
?>