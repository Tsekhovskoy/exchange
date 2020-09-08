<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/models/Db_connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/helpers/cleaner.php';

/**
 * The Address deletion class. Removes an address by its ID
 * */

class Delete_course
{
    protected $id;
    protected $connection;
    public $cleaner;

    public function __construct(Db_connection $connection)
    {
        $this->connection = $connection;
        $this->cleaner = new Cleaner();
        $this->id = $this->cleaner->cleanData($_POST["id"]);
    }



    public function delete() {

        if ($this->isExist($this->id)) {
            $sql = 'DELETE FROM force_course WHERE id = ?';
            $this->connection->query($sql, [$this->id]);
            $status = ['Message' => 'success'];
            echo json_encode($status);
        } else {
            http_response_code(404);
        }
    }

    public function isExist($id) {
        $sql = 'SELECT * FROM force_course WHERE id = ?';
        $result = $this->connection->query($sql, [$this->id]);

        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function execute() {
        $this->delete();
    }
}
