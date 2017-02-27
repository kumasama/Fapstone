<?php
	function PDO_Connection() {
		return new PDO('mysql:host=127.0.0.1;dbname=ootdme', 'root', '131322');
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

	function deleteById($id, $table_name) {
		try {
			$db = PDO_Connection();
			$sql = 'delete from ' . $table_name . ' where id=?';
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($id));
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

  	function fetchById($id, $table_name) {
  		try {
  			$db = PDO_Connection();
  			$sql = 'select * from ' . $table_name . ' where id = ?';
  			$stmt = $db->prepare($sql);
  			$stmt->execute(array($id));
  			$result = $stmt->fetch();
  			$db = null;
  		} catch(PDOException $e) {
  			echo $e->getMessage();
  		}
  		return $result;
  	}
	//SQL Commands

	function updateSQL($arr, $table_name) {
		$sql = 'UPDATE ' . $table_name . ' SET ';
		for($i = 0; $i<count($arr); $i++)  {
			$sql = $sql . $arr[$i] . '=?';
			if($i < count($arr) - 1)
				$sql = $sql . ', ';
		}
		return $sql;
	}

	function fetchAll($table_name) {
		try {
			$db = PDO_Connection();
			$sql = 'select * from ' . $table_name;
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	} 

	function fetchAll_sort($table_name, $field, $by) {
		try {
			$db = PDO_Connection();
			$sql = 'select * from ' . $table_name . ' ORDER BY ' . $field . ' ' . $by;
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}

	function fetchClosetItems_search($closet_id, $search) {
		try {
			$db = PDO_Connection();
			// $sql = "select * from items where ((name like '%" . $search . "%') or (type like '%" . $search . "%') or (brand like '%" . $search . "%')) and (id in(select item_id from closet_items where closet_id=?))";
			$sql = "select * from closet_items where closet_id=? and (item_id in(select id from items where ((name like '%" . $search . "%') or (type like '%" . $search . "%') or (brand like '%" . $search . "%'))))";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($closet_id));
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}


	function fetchItems_search($id, $search) {
		try {
			$db = PDO_Connection();
			$sql = "select * from items where ((name like '%" . $search . "%') or (type like '%" . $search . "%') or (brand like '%" . $search . "%')) and (chaser_id=?) and (id not in(select item_id from closet_items))";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}

	function fetchItems($chaser_id) {
		try {
			$db = PDO_Connection();
			$sql = 'select * from items where (chaser_id=?) and (id not in(select item_id from closet_items))';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($chaser_id));
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}

	function fetchClosets($chaser_id) {
		try {
			$db = PDO_Connection();
			$sql = 'select * from closets where chaser_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($chaser_id));
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}
	
	function fetchClosetItems($id) {
		try {
			$db = PDO_Connection();
			$sql = 'select * from closet_items where closet_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$result = $stmt->fetchAll();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}	

	function fetchGarageItems() {

	}

	function if_Follower($id, $chaser_id) {
      $follower = false;
      try {
          $db = PDO_Connection();
          $sql = 'select count(*) from networks where follow_id=? and chaser_id=?';
          $stmt = $db->prepare($sql);
          $stmt->execute(array($chaser_id, $id));
          $result = $stmt->fetch();
          if($result[0]>0) {
              $follower = true;
          }
      } catch(PDOException $e) {
          echo $e->getMessage();
      }
      return $follower;
	}

	function count_followers($id) {
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from networks where follow_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$result = $stmt->fetch();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result[0];
	}

	function count_following($id) {
		try {
			$db = PDO_Connection();
			$sql = 'select count(*) from networks where chaser_id=?';
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$result = $stmt->fetch();
			$db = null;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $result[0];
	}

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

	function getPK($table_name) {
			try {
				$db = PDO_Connection();
				$sql = 'SHOW COLUMNS FROM ' . $table_name;
				$stmt = $db->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetch();
				$db = null;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
			return $result[0];
		}
?>