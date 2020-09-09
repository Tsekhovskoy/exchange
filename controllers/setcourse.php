<?php
/**
 * The force course recording controller. Controller calls the "execute" method from the Set_course.php model, set
 * the new course's parameters to the database and get all force course records from it.
 * Controller calls from /js/add_course.js and /js/show_template.js
 */

//require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Set_course.php');
require_once ('./../models/Set_course.php');
$forceModel = new Set_course(Db_connection::getInstance());
$forceModel->execute();
