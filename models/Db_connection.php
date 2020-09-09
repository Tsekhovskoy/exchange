<?php

/**
 * Class Db_connection
 * The database connection class. Enter your sql-server parameters here
 */

class Db_connection
{
    private static $instance;
    public $pdo;
    //Enter your mysql-server information here
    protected $dbName = 'exchange';
    protected $user = 'root';
    protected $password = '2151';
    protected $host = '127.0.0.1';

    /**
     * Db_connection constructor.
     */
    private function __construct()
    {
        $dsn = "mysql:host=$this->host; dbname=$this->dbName";
        $this->pdo = new PDO($dsn, $this->user, $this->password);
    }

    /**
     * @return Db_connection
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db_connection();
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param $params
     * @return array
     */
    public function query($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}