<?php

require_once(ROOT . "/app/Db_connection.php");

/**
 * Class Abstract_model
 * The parent class for models
 */
abstract class Abstract_model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Db_connection::getInstance();
    }

    public function execute() {

    }
}