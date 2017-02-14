<?php
	function PDO_Connection() {
		return new PDO('mysql:host=127.0.0.1;dbname=capstone', 'root', '131322');
	}

	function checkExisting($arr, $table_name) {
		$exist_status = false;
		try {
			$data = splitArr($arr);
			$db = PDO_Connection();
			$sql = inquireSQL($data[0][0], $table_name);
			$stmt = $db->prepare($sql);
			$stmt->execute($data[1]);
			$result = $stmt->fetch();
			if($result[0]>0) {
				$exist_status = true;
			}
		}catch(PDOException $e) {
			echo $e->getMessage();
		} 
		return $exist_status;
	}

	function insert($arr, $table_name) {
		try {
			$data = splitArr($arr);
			$db = PDO_Connection();
			$sql = insertSQL($data[0], $table_name);
			$stmt = $db->prepare($sql);
			$success = $stmt->execute($data[1]);
			$db = null;
		}catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $success;
	}

	function splitArr($data) {
		$arr_keys = array(); // for keys
		$arr_vals = array(); // for values
		foreach($data as $key=>$value) {
			$arr_keys[] = $key;
			$arr_vals[] = $value;
		}
		return array($arr_keys, $arr_vals);
	}

	function login($user, $password) {
	    try {
	      $data = array($user,$user,$password);
	      $db = PDO_Connection();
	      $sql = 'SELECT id FROM chasers WHERE (username=? OR email=?) and password=?';
	      $stmt = $db->prepare($sql);
	      $stmt->execute($data);
	      if($stmt->rowCount()>0) {
	        $result = $stmt->fetch();
	      } else {
	        $result = array('id'=>-1);
	      }
	      $db = null;
	    } catch(PDOException $e) {
	      echo $e->getMessage();
	    }
    	return $result['id'];
  	}


	//SQL Commands

	function insertSQL($arr, $table_name) {
		$sql = 'INSERT INTO ' . $table_name . ' (';
		for($i = 0; $i<count($arr); $i++)  {
			$sql = ($i < count($arr)-1)? $sql . $arr[$i] . ', ' : $sql . $arr[$i] . ') VALUES (';
		}
		for($i = 0; $i<count($arr); $i++) {
			$sql = ($i < count($arr)-1)? $sql . '?, ': $sql . '?)';
		}
		return $sql;
	}

	function inquireSQL($col_name, $table_name) {
		$sql = 'SELECT COUNT(*) FROM ' . $table_name . ' WHERE ' . $col_name . '=?';
		return $sql;
	}

	//SQL Commands
?>