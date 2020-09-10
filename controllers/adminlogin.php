<?php
/**
 * The administrator authorisation controller. Controller calls "execute" method from Auth_model.php.
 * If validation process fails, the authorization form will reload with error message.
 * Controllers calls from /views/auth.php
 */

//require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/models/Auth_model.php');
require_once ('./../models/Auth_model.php');

$authModel = new Auth_model(Db_connection::getInstance());
$status = $authModel->execute();
if ($status == 'Success') {
//    require_once $_SERVER['DOCUMENT_ROOT'].'/exchange/views/set_course.php';
    require_once ('./../views/set_course.php');
} elseif ($status == 'Error') {
    echo '<p style="color: red">Sorry, check your login or password</p>';
//    require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/views/auth.php');
    require_once ('./../views/auth.php');
}
elseif ($status == 'Empty') {
    echo '<p style="color: red">Sorry, the server crashed</p>';
//    require_once ($_SERVER['DOCUMENT_ROOT'].'/exchange/views/auth.php');
    require_once ('./../views/auth.php');
}

