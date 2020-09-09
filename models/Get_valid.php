<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/exchange/models/Db_connection.php';

class Get_valid
{
    protected $connection;

    public function __construct(Db_connection $connection)
    {
        $this->connection = $connection;
    }

    public function compareValidDate()
    {
        $sql = 'SELECT * FROM force_course WHERE stopdate >= CURRENT_TIMESTAMP AND startdate = (SELECT MAX(startdate) FROM force_course)';
        $result = $this->connection->query($sql, []);
        $result = array_shift($result);

        if (!empty($result)) {
            $course['course'] = $result['course'];
            return $course;
        } else {
            return false;
        }
    }
    public function execute() {
        $course = $this->compareValidDate();
        return $course;
    }
}
