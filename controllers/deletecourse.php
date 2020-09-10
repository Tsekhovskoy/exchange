<?php
/**
 * The force course record deleting controller. Controller calls "execute" method from the Delete_course.php model.
 * The record will be delete from database without page reloading after executing.
 * Controller calls from /js/delete_course.js
 */

//require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Delete_course.php');
require_once ('./../models/Delete_course.php');

$deleteModel = new Delete_course(Db_connection::getInstance());
$deleteModel->execute();