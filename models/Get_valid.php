<?php

require_once (ROOT . "/models/Abstract_model.php");

/**
 * Class Get_valid
 * Class does the sql request and looks for valid force course in the database
 */
class Get_valid extends Abstract_model
{
    /**
     * @return false
     * Method check valid force course
     */
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

    /**
     * @return false
     * The execute method
     */
    public function execute() {
        $course = $this->compareValidDate();
        return $course;
    }
}
