<?php

//require_once('Db_connection.php');
require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/models/Db_connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/helpers/cleaner.php';

class Auth_model
{
    protected const SALT = 'change';
    protected $connection;
    protected $data;
    public $cleaner;

    public function __construct(Db_connection $connection)
    {
        $this->connection = $connection;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['uname']) && isset($_POST['psw'])) {
                $this->cleaner = new Cleaner();
                $this->data = array(
                    'name' => $this->cleaner->cleanData($_POST['uname']),
                    'password' => $this->cleaner->cleanData($_POST['psw'])
                );

            }
        }
    }

    public function load() {
        $sql = 'SELECT * FROM admin';
        $result = $this->connection->query($sql, []);

        foreach ($result as $value) {
            if ($value['name'] == $this->data['name'] && md5($value['password'].self::SALT == $this->data['password'])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function execute() {
        return $this->load();
    }
}
