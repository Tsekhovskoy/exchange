<?php

require_once (ROOT . "/helpers/Cleaner.php");
require_once (ROOT . "/models/Abstract_model.php");

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
     */
    public function __construct()
    {
        parent::__construct();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["forcecourse"])) {
                $dateTime = $_POST["date"] . ' ' . $_POST["time"];
                $this->stopdate = date("Y-m-d H:i:s", strtotime($dateTime));
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
