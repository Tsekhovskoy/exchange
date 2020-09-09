<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Get_valid.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Get_course.php');

$courseModel = new Get_valid(Db_connection::getInstance());
$newCourse = $courseModel->execute();

if (empty($newCourse)) {
    $courseModel = new Get_course();
    $newCourse = $courseModel->execute();
}

if(!empty($newCourse)) {
    echo json_encode($newCourse);
}
