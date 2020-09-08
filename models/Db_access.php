<?php

require_once 'Db_connection.php';

class Db_access {
    protected $connection;

    protected function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    protected function load($tableName) {
        $sql = 'SELECT * FROM ? ';
        $result = $this->connection->query($sql, $tableName);
    }

}