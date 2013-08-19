<?php

namespace Bookstore\Repository;

use Util\Mapper\BaseRepository;
use Zend\Db\Adapter\Adapter;

class BookRepository extends BaseRepository {

    protected $table = 'books';

    public function __construct(Adapter $connection) {
        parent::__construct($connection);
    }
}