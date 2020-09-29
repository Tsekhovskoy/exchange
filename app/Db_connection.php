<?php

interface DBConnectionInterface {
    public static function getInstance();
}

/**
 * Class Db_connection
 * The database connection class.
 */
class Db_connection implements DBConnectionInterface
{
    private static $instance;
    public $pdo;

    /**
     * Db_connection constructor.
     */
    private function __construct()
    {

        require_once(ROOT . "/vendor/autoload.php");

        $dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
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