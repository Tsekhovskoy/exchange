<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/models/Db_connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/helpers/cleaner.php';

class Set_course
{
    protected $connection;
    protected $data;

    public function __construct(Db_connection $connection)
    {
        $this->connection = $connection;
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["datetime"]) && isset($_POST["forcecourse"])) {
                $dat = date("Y-m-d H:i:s", strtotime($_POST["datetime"]));
                if ($dat < date('Y-m-d H:i:s')) {
                    return ('Enter correct date and time');
                }
                $ndate = new DateTime($dat);
                $this->data = array(
                    'stopdate' => $this->cleanData($dat),
                    'forcecourse' => $this->cleanData($_POST["forcecourse"]),
                );
            }
        }
    }

    public function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function save() {

        $sql = 'INSERT INTO force_course (stopdate, course) VALUES (?, ?)';
        $result = $this->connection->query($sql, [$this->data['stopdate'], $this->data['forcecourse']]);
    }

    public function load() {
        $sql = 'SELECT * FROM force_course ORDER BY stopdate DESC';
        $result = $this->connection->query($sql, []);

        if (count($result)) {
            echo json_encode($result);
        }
    }
    public function execute() {
        $this->save();
        $this->load();
    }
}
