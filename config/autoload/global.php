<?php
return array (
	'db' => array (
		'driver' => 'Pdo',
		'dsn'    => 'mysql:dbname=bookstore;host=127.0.0.1',
		'username' => 'root',
		'password' => 'm$1234',
		'driver_options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
		)
	),
);
