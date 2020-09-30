<?php

/**
 * The actual course viewing controller. Controller firstly check the force course ("execute" method from the Get_valid.php model).
 * If force course date valid, controller gets the actual course from database.
 * If force course date not valid, controller calls "execute" method from NBU model and get course from NBU api.
 */

require_once (ROOT . "/models/Get_valid.php");
require_once (ROOT . "/app/NBU.php");

class Show
{
    public function actionShow() {
        $courseModel = new Get_valid(Db_connection::getInstance());
        $newCourse = $courseModel->execute();

        if (empty($newCourse)) {
            $newCourse = NBU::getNBUCourse();
        }

        if (!empty($newCourse)) {

           echo json_encode($newCourse, JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
        }
    }
}