<?php

/**
 * The database connection class
 * */

class Db_connection
{
    private static $instance;
    public $pdo;
    //Enter your mysql-server information here
    protected $dbName = 'exchange';
    protected $user = 'root';
    protected $password = '2151';
    protected $host = '127.0.0.1';

    private function __construct()
    {
        $dsn = "mysql:host=$this->host; dbname=$this->dbName";
        $this->pdo = new PDO($dsn, $this->user, $this->password);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db_connection();
        }
        return self::$instance;
    }

    public function query($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}