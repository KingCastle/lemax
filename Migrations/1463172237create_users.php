<?php

	namespace Lemax;
	/**
	* Migration
	* @author : Alireza Josheghani
	*/

	class create_users extends Migrates {
		function up(){
			$this->create('users',[
				// e.g: 'fullname' => 'varchar(200)',
				'created_at' => $db->timestamp('created_at'),
				'updated_at' => $db->timestamp('updated_at')
			]);
		}
		function down(){
			$this->drop('users');
		}
	}