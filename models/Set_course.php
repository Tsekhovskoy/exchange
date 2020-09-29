<?php

require_once (ROOT . "/components/Db_connection.php");

use helpers\Cleaner;
use models\Abstract_model;

//set_include_path($_SERVER['DOCUMENT_ROOT'] . "/exchange");
//require_once('components/Db_connection.php');
//require_once ('helpers/Cleaner.php');
//require_once ('./../models/Abstract_model.php');
//require_once ($_SERVER['DOCUMENT_ROOT'] . "/models/Abstract_model.php");

/**
 * Class Set_course
 * Class sets a new force course to database and get the force course list
 */

class Set_course extends Abstract_model
{

    protected $data;
    protected $stopdate;

    /**
     * Set_course constructor.
     * @param DBConnectionInterface $connection
     */
    public function __construct(DBConnectionInterface $connection)
    {
        parent::__construct($connection);

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["datetime"]) && isset($_POST["forcecourse"])) {
                $this->stopdate = date("Y-m-d H:i:s", strtotime($_POST["datetime"]));
                $this->data = array(
                    'stopdate' => Cleaner::cleanData($this->stopdate),
                    'forcecourse' => (float)Cleaner::cleanData($_POST["forcecourse"]),
                );
            }
        }
    }

    /**
     * Set entered force course parameters to database and call "isSaved" method from recording process validation
     */
    public function save() {
            $sql = 'INSERT INTO force_course (stopdate, course) VALUES (?, ?)';
            $this->connection->query($sql, [$this->data['stopdate'], $this->data['forcecourse']]);

            if(!$this->isSaved()) {
                http_response_code(404);
            }
    }

    /**
     * @return bool
     * Method checks - is exist the record inside database. If doesn't - false will return
     */
    public function isSaved() {
        $sql = 'SELECT * FROM force_course WHERE stopdate=? AND CAST(course AS DECIMAL(5,2)) =?';
        $result = $this->connection->query($sql, [$this->data['stopdate'], $this->data['forcecourse']]);

        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the force course list
     */
    public function load() {
        $sql = 'SELECT * FROM force_course ORDER BY startdate DESC';
        $result = $this->connection->query($sql, []);

        if (count($result)) {
            echo json_encode($result);
        }
    }

    /**
     * Execute method
     */
    public function execute() {
        $this->save();
        $this->load();
    }
}
