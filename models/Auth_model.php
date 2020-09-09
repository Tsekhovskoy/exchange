<?php

//require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/models/Db_connection.php';
require_once ('./../models/Db_connection.php');
//require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/helpers/cleaner.php';
require_once ('./../helpers/cleaner.php');

/**
 * Class Auth_model
 * Class gets $_POST parameters from admin authorisation form (/view/auth.php) and does login/password validation
 */

class Auth_model
{
    protected const SALT = 'change';
    protected $connection;
    protected $data;
    public $cleaner;

    /**
     * Auth_model constructor.
     * @param Db_connection $connection
     */
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

    /**
     * @return bool
     * Access validation
     */
    public function load() {
        $sql = 'SELECT * FROM admin';
        $result = $this->connection->query($sql, []);

        foreach ($result as $value) {
            if (($value['name'] === $this->data['name']) && ((md5($this->data['password'].self::SALT) === $value['password']))) {
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
