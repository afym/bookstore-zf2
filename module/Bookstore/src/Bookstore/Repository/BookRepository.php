<?php

namespace Bookstore\Repository;

use Util\DataBase\AbstractRepository;
use Util\DataBase\Connection;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Bookstore\Entity\Book;

class BookRepository extends AbstractRepository
{
	public function __construct(Connection $connection)
	{
		parent::__construct($connection);
	}
}