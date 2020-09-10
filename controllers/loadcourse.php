<?php

/**
 * The force course loading controller. Controller calls the "load" method from the Set_course.php model and get all
 * force course records from it.
 * Controller calls from  /js/show_template.js
 */

require_once('./../models/Set_course.php');

$forceModel = new Set_course(Db_connection::getInstance());
$forceModel->load();