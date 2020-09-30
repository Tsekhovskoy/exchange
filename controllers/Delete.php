<?php
/**
 * The force course record deleting controller.
 * The record will be delete from database without page reloading after executing.
 * Controller calls from /js/delete_course.js
 */

require_once (ROOT . "/models/Delete_course.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Delete
 */
class Delete extends AbstractController
{
    public function actionDelete() {
        $deleteModel = new Delete_course(Db_connection::getInstance());
        $deleteModel->execute();
    }
}