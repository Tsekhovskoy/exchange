<?php
/**
 * The administrator authorisation controller. Controller calls "execute" method from Auth_model.php.
 * If validation process fails, the authorization form will reload.
 * Controllers calls from /views/auth.php
 */

use app\View;

require_once (ROOT . "/models/Auth_model.php");

/**
 * Class Login
 */
class Login
{
    public function actionLogin() {
        session_start();

        if (isset($_SESSION['user'])) {
            require_once('views/set_course.php');
        } else {
            $authModel = new Auth_model(Db_connection::getInstance());
            $status = $authModel->execute();

            if ($status === 'Success') {
                View::render('set_course');
                //require_once('./../views/set_course.php');
            } elseif
            ($status === 'Error') {
                //echo '<p style="color: red">Sorry, check your login or password</p>';
                View::render('auth');
                //require_once('./../views/auth.php');
            } elseif ($status === 'Empty') {
                echo '<p style="color: red">Sorry, the server with your personal data crashed</p>';
                View::render('auth');
                //require_once('./../views/auth.php');
            }
        }
    }
}

