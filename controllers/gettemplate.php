<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Get_course.php');
$courseModel = new Get_course();
$newCourse = $courseModel->execute();
if(!empty($newCourse)) {
    echo json_encode($newCourse);
}
else {
    echo 'Current course is not available now!';
}