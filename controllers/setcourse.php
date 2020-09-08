<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Set_course.php');
$forceModel = new Set_course(Db_connection::getInstance());
$forceModel->execute();
