<?php

/**
 * The actual course viewing controller. Controller firstly check the force course ("execute" method from the Get_valid.php model).
 * If force course date valid, controller calls "execute" method from Get_valid model and get the actual course from database.
 * If force course date not valid, controller calls "execute" method from Get_course model and get course from NBU api.
 */

//require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Get_valid.php');
require_once ('./../models/Get_valid.php');
//require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Get_course.php');
require_once ('./../models/Get_course.php');

$courseModel = new Get_valid(Db_connection::getInstance());
$newCourse = $courseModel->execute();

if (empty($newCourse)) {
    $courseModel = new Get_course();
    $newCourse = $courseModel->execute();
}

if(!empty($newCourse)) {
    echo json_encode($newCourse);
}
