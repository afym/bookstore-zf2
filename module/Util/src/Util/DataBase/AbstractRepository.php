<?php

namespace Util\DataBase;

use Util\DataBase\Connection;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

abstract class AbstractRepository {
	protected $connection;
	protected $sql;

	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
		$this->sql = new Sql($this->connection->getConnection());
	}

	public function persist($table, $data)
	{
		if ($data['id'] == 0) {
			unset($data['id']);
		}

		$insert = $this->sql->insert($table)->values($data);

   		$sql = $this->sql->getSqlStringForSqlObject($insert);
    	$stm = $this->connection->getConnection()->query($sql);
		$result = $stm->execute();

    	return $result->getGeneratedValue();
	}

	public function fetchAll($table)
	{
		$select = $this->sql->select()->from('books');

		$sql = $this->sql->getSqlStringForSqlObject($select);
		$stmt = $this->connection->getConnection()->query($sql);
		$result = $stmt->execute();

		$resultSet = new ResultSet();

		return $resultSet->initialize($result)->toArray();
	}
}