<?php
	require_once('functions.php');

	$chaser_id = (isset($_GET['chaser_id']))?$_GET['chaser_id']:'';
	$search = (isset($_GET['search']))?$_GET['search']:'';

	echo json_encode(searchChasers($chaser_id,$search));

	function searchChasers($id, $search) {
		try {
			$db = PDO_Connection();
			$sql = "select * from chasers where not id=? and ((last_name like '%" . $search . "%') or (first_name like '%" . $search . "%') or (username like '%" . $search . "%'))";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$result = $stmt->fetchAll();
		} catch(Exception $e) {
			echo $e->getMessage();
		}
		return $result;
	}
?>