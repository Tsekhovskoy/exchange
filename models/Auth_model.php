<?php


require_once (ROOT . "/components/Db_connection.php");

use helpers\Cleaner;
use models\Abstract_model;

/**
 * Class Auth_model
 * Class gets $_POST parameters from admin authorisation form (/view/auth.php) and does login/password validation
 */

class Auth_model extends Abstract_model
{
    protected const SALT = 'change';
    protected $data;

    /**
     * Auth_model constructor.
     * @param DBConnectionInterface $connection
     */
    public function __construct(DBConnectionInterface $connection)
    {
        parent::__construct($connection);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['uname']) && isset($_POST['psw'])) {
                $this->data = array(
                    'name' => Cleaner::cleanData($_POST['uname']),
                    'password' => Cleaner::cleanData($_POST['psw'])
                );
            }
        }
    }

    /**
     * @return string
     * Access validation
     */
    public function load()
    {
        $sql = 'SELECT * FROM admin';
        $result = $this->connection->query($sql, []);

        if ($result) {
            $status = 'Error';
            foreach ($result as $value) {
                if (($value['name'] === $this->data['name']) && ((md5($this->data['password'] . self::SALT) === $value['password']))) {
                    ini_set('session.gc_maxlifetime', 1);
                    session_start();
                    $_SESSION['user'] = $this->data['name'];
                    $path = session_save_path();
                    $status = 'Success';
                }
            }
        } else {
            $status = 'Empty';
        }
        return $status;
    }

    public function execute() {
        return $this->load();
    }
}
