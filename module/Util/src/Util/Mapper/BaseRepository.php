<?php

/**
 * @author Jesus Cristo
 * @author Angel Ybarhuen Manrique <angel.fym@gmail.com>
 * 
 */

namespace Util\Mapper;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

/**
 * @property String $table
 * @property Zend\Db\Adapter\Adapter
 * @property Zend\Db\ResultSet\ResultSet
 * @property Zend\Db\Sql\Sql $sql Description
 */
abstract class BaseRepository {

    protected $table;
    protected $adapter;
    protected $resultSet;
    protected $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
        $this->resultSet = new ResultSet();
    }

    /**
     * @param Array $columns
     * @return Array
     */
    public function find($columns = array(), $where = array()) {
        $query = $this->sql->select()
                ->from($this->table);

        if (!empty($columns)) {
            $query->columns($columns);
        }

        if (!empty($where)) {
            $query->where($where);
        }

        $result = $this->executeQuery($query);

        return $this->resultSet->initialize($result)->toArray();
    }

    /**
     * @param Array $values
     * @return int
     */
    public function add($values) {
        $sql = $this->sql->insert()
                ->into($this->table)
                ->values($values);

        $result = $this->executeQuery($sql);

        return $result->getGeneratedValue();
    }

    /**
     * @param Array $values
     * @param Array $where
     * @return int
     */
    public function update($values, $where) {
        $sql = $this->sql->update()
                ->table($this->table)
                ->set($values)
                ->where($where);

        $result = $this->executeQuery($sql);

        return $result->getGeneratedValue();
    }

    /**
     * @param Array $where
     * @return void
     */
    public function delete($where) {
        $sql = $this->sql->delete()
                ->from($this->table)
                ->where($where);

        $this->executeQuery($sql);
    }

    /**
     * @param Sql $sql
     * @return ResultInterface
     */
    public function executeQuery($query) {
        $sql = $this->sql->getSqlStringForSqlObject($query);
        $stmt = $this->adapter->query($sql);

        return $stmt->execute();
    }

}