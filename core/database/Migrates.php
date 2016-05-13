<?php

	/**
	* @author : Alireza Josheghani 
	*/
	class Migrate extends medoo {
		function create($table_name,$properties){
			$MysDB = [];
			foreach ($properties as $property => $value) {
				$query = $property." ".$value." ";
				array_push($MysDB,$query);
			}
			$count = count($MysDB);
			$i = 0;
			$query = "id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY";
			while ($i <= $count-1) {
				$query .= " , ".$MysDB[$i++];
			}
			$q = "CREATE TABLE ".$table_name."(".$query.")";
			echo $q;
			$this->query($q);	
		}
		function drop($db_name){
			$this->query("
				DROP TABLE ".$db_name."
			");
			exit;
		}
	}

?>