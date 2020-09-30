<?php

/**
 * Class Abstract_model. The parent class for models
 */

require_once(ROOT . "/app/Db_connection.php");

abstract class Abstract_model
{
    protected $connection;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    abstract public function execute();
}