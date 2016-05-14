<?php

	namespace Lemax\database;
	use Lemax\database\medoo as DB;

	require './core/database/medoo.php';

	$db = new DB([
		// required
		'database_type' => 'mysql',
		'database_name' => 'lmax',
		'server' => 'localhost',
		'username' => 'root',
		'password' => 'ultraviolet',
		'charset' => 'utf8'
	]);

	require './public/index.php';