<?php

require_once ('./../models/Db_connection.php');
require_once ('./../helpers/cleaner.php');

/**
 * Class Set_course
 * Class sets a new force course to database and get the force course list
 */

class Set_course
{
    protected $connection;
    protected $data;
    protected $stopdate;
    public $cleaner;

    /**
     * Set_course constructor.
     * @param Db_connection $connection
     */
    public function __construct(Db_connection $connection)
    {
        $this->connection = $connection;

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["datetime"]) && isset($_POST["forcecourse"])) {
                $this->stopdate = date("Y-m-d H:i:s", strtotime($_POST["datetime"]));
                $this->cleaner = new Cleaner();
                $this->data = array(
                    'stopdate' => $this->cleaner->cleanData($this->stopdate),
                    'forcecourse' => $this->cleaner->cleanData($_POST["forcecourse"]),
                );
            }
        }
    }

    /**
     * Set entered force course parameters to database
     */
    public function save() {
            $sql = 'INSERT INTO force_course (stopdate, course) VALUES (?, ?)';
            $this->connection->query($sql, [$this->data['stopdate'], $this->data['forcecourse']]);

            if(!$this->isSaved()) {
                http_response_code(404);
            }
    }

    public function isSaved() {
        $sql = 'SELECT * FROM force_course WHERE stopdate=? AND course=?';
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
        } else {
            http_response_code(404);
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
