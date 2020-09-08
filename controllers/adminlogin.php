<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Auth_model.php');
//require_once ('');
$authModel = new Auth_model(Db_connection::getInstance());
if ($authModel->execute()) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/views/set_course.php';
}
else {
    echo '<p>Sorry, you entered incorrect username or password</p>';
    require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/views/auth.php');
}

