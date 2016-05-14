<?php

	/**
	* Migration
	* @author : Alireza Josheghani
	*/

	namespace Lemax\database;
	use Lemax\database\Migrate as Migrate;

	class create_{name} extends Migrate {
		function up(){
			$this->create('{name}',[
				// e.g: 'fullname' => 'varchar(200)',
				'created_at' => $db->timestamp('created_at'),
				'updated_at' => $db->timestamp('updated_at')
			]);
		}
		function down(){
			$this->drop('{name}');
		}
	}