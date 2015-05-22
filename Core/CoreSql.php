<?php
	class CoreSql{

		private static $PDO;

		public static function connect()
		{
			try {
				self::$PDO = new PDO(_SERVER, _USER, _PASS, array(
    				PDO::ATTR_PERSISTENT => true,
    				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				));
			}catch(Exception $e){
				die("Impossible de se connecter: " . $e->getMessage());
			}
		}

		public static function close(){
			self::$PDO = null;
		}

		public static function getPDO(){
			return self::$PDO;
		}

		/*exec query select secure inputs avant !!!!!*/
		public static function query($query)
		{
			try{
				if($res = self::$PDO->query($query)){
					return $res->fetchAll(PDO::FETCH_ASSOC);
				}
			}catch(Exception $e){
				die("Erreur Query : " . $e->getMessage());
			}
		}

		/*return true if insert or false if not*/
		public static function exec($query)
		{
			try{
				self::$PDO->prepare($query);
				return self::$PDO->exec();
			}catch(Exception $e){
				die("Erreur exec : " . $e->getMessage());
			}
		}

		public static function delete($id, $table){
        	$query = "DELETE FROM $table WHERE id = :id";
        	$query = self::$PDO->prepare($query);
        	$query->bindValue(":id", $id);
        	return $query->execute();
   	 	}

   	 	/*
   	 	* data : objet a inserer
   	 	* table : table cible
   	 	* return : false -> true or false
   	 	*		   true -> lastinsertid
   	 	*/

   	 	public static function save($data, $table, $return = true){
        	if(isset($data->id) && $data->id != ''){
        		//update
        		$dataTab = get_object_vars($data);
        		$query = "UPDATE $table SET ";
        		foreach ($data as $key => $value) {
        				if($key != 'id')
        					$query .= "$key = :$key , ";
        		}
        		$query = substr($query, 0, -2);
        		$query .= "WHERE id = :id;";
        		$query = self::$PDO->prepare($query);
        		foreach ($data as $key => $value) {
        			$query->bindValue(":$key", $value);
        		}
        		return $query->execute();
        	}else{
        		//insert
        		$dataTab = get_object_vars($data);
        		$lastKey = end((array_keys($dataTab)));
        		$query = "INSERT INTO $table (";
        		foreach ($data as $key => $value) {
        				if($key != 'id')
        					$query .= "$key , ";
        		}
        		$query = substr($query, 0, -3);
        		$query .= ") VALUES (";
        		foreach ($data as $key => $value) {
        				if($key != 'id')
        					$query .= ":$key , ";
        		}
        		$query = substr($query, 0, -3);
        		$query .= ");";
				$query = self::$PDO->prepare($query);
				foreach ($data as $key => $value) {
        			$query->bindValue(":$key", $value);
        		}
        		if(!$return){
					$query->execute();
					return self::$PDO->commit();
        		}else{
	        			self::$PDO->beginTransaction();
	        			$query->execute();
	        			$id = self::$PDO->lastInsertId();
						self::$PDO->commit();
						return $id;
        		}

        	}
        }

        public static function findId($fields, $table, $multiple = false){
        	$query ='SELECT ID FROM '.$table.' WHERE ';
        	foreach ($fields as $key => $value) {
        		$query .= "$key = :$key AND ";
        	}
        	$query = substr($query, 0, -4);
        	$query .= ';';
        	$query = self::$PDO->prepare($query);
			foreach ($fields as $key => $value) {
    			$query->bindValue(":$key", $value);
    		}

    		$query->execute();

    		if(!$multiple)
    			return $query->fetchAll(PDO::FETCH_ASSOC);
    		else
    			return $query->fetch(PDO::FETCH_ASSOC);

        }

        public static function find($fields, $table){
            $query ='SELECT * FROM '.$table.' WHERE ';
            foreach ($fields as $key => $value) {
                $query .= "$key = :$key AND ";
            }
            $query = substr($query, 0, -4);
            $query .= ';';
            $query = self::$PDO->prepare($query);
            foreach ($fields as $key => $value) {
                $query->bindValue(":$key", $value);
            }
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getTable($table){
            $query ='SELECT * FROM '.$table.';';
            $query = self::$PDO->prepare($query);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
