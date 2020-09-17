<?php

/**
 * Class Db_connection
 * The database connection class. Enter your sql-server parameters here
 */

interface DBConnectionInterface {
    public static function getInstance();
}

class Db_connection implements DBConnectionInterface
{
    private static $instance;
    public $pdo;
    //Enter your mysql-server information here
//    protected $dbName = 'exchange';
//    protected $user = 'exchange';
//    protected $password = '4L8m9R0r';
//    protected $host = 'exchange.devtestnet.com';

    /**
     * Db_connection constructor.
     */
    private function __construct()
    {
        set_include_path($_SERVER['DOCUMENT_ROOT'] . "/exchange");
        require 'vendor/autoload.php';
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_NAME'];

        $dsn = "mysql:host=$host; dbname=$name";
        $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
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