<?php
/**
 * The administrator authorisation controller. Controller calls "execute" method from Auth_model.php.
 * If validation process fails, the authorization form will reload.
 * Controllers calls from /views/auth.php
 */

require_once (ROOT . "/models/Auth_model.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Login
 */
class Login extends AbstractController
{
    public function actionLogin() {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->view->render('set_course');
        } else {
            $authModel = new Auth_model();
            $status = $authModel->execute();

            if ($status === 'Success') {
                $this->view->render('set_course');
            } elseif
            ($status === 'Error') {
                $this->view->render('auth');
            } elseif ($status === 'Empty') {
                echo '<p style="color: red">Sorry, the server with your personal data crashed</p>';
                $this->view->render('auth');
            }
        }
        session_write_close();
    }
}

