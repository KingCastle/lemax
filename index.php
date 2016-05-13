<?php

	require 'bootstrap/autoload.php';

	$db = new Migrate([
		'database_type' => 'mysql',
		'server' => 'localhost',
		'username' => 'root',
		'database_name' => 'lmax',
		'password' => 'ultraviolet',
		'charset' => 'utf8'
	]);

	$db->create('posts',[
		'username' => 'varchar(255)'
	]);

?>