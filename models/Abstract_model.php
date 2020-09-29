<?php
namespace models;

abstract class Abstract_model
{
    protected $connection;

    public function __construct(\DBConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    abstract public function execute();
}