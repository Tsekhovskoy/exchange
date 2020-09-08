<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Delete_course.php');
$deleteModel = new Delete_course(Db_connection::getInstance());
$deleteModel->execute();