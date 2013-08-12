<?php

namespace Util\DataBase;

use Zend\Db\Adapter\Adapter;

class Connection {
	private $connection;

	public function __construct($connectionConfig)
	{
		$this->connection = new Adapter($connectionConfig);
	}

	public function getConnection()
	{
		return $this->connection;
	}
}