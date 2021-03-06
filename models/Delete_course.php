<?php

require_once (ROOT . "/helpers/Cleaner.php");
require_once (ROOT . "/models/Abstract_model.php");

/**
 * Class Delete_course
 * Class removes an force course record by its ID.
 */
class Delete_course extends Abstract_model
{
    protected $id;

    /**
     * Delete_course constructor.
     */
    public function __construct()
    {
        parent::__construct();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["id"])) {
                $this->id = Cleaner::cleanData($_POST["id"]);
            }
        }
    }

    /**
     * Method deletes force course record from database by its id
     */
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

    /**
     * @param $id
     * @return bool
     * Method check availability of force course by id in database
     */
    public function isExist($id) {
        $sql = 'SELECT * FROM force_course WHERE id = ?';
        $result = $this->connection->query($sql, [$this->id]);

        if (count($result)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * The execute method
     */
    public function execute() {
        $this->delete();
    }
}
