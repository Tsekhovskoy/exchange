<?php
/**
 * The administrator authorisation controller. Controller calls "execute" method from Auth_model.php.
 * If validation process fails, the authorization form will reload.
 * Controllers calls from /views/auth.php
 */

require_once (ROOT . "/app/View.php");
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
            } elseif
            ($status === 'Error') {
                View::render('auth');
            } elseif ($status === 'Empty') {
                echo '<p style="color: red">Sorry, the server with your personal data crashed</p>';
                View::render('auth');
            }
        }
    }
}

