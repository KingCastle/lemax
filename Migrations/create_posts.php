<?php

	/**
	* Migrations
	* @author : Alireza Josheghani
	*/
	class creat_post extends Migrate{
		function up(){
			$this->create('posts',[
				'title' => 'varchar(255)',
				'content' => 'text',
				'views' => 'integer',
				'creator' => 'int'
			]);
		}
		function down(){
			$this->drop('posts');
		}
	}

?>