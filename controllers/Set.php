<?php
/**
 * The force course recording controller. Controller calls the "execute" method from the Set_course.php model, set
 * the new course's parameters to the database and get all force course records from it.
 * Controller calls from /js/add_course.js
 */

require_once (ROOT . "/models/Set_course.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Set
 */
class Set extends AbstractController
{
    public function actionSet() {
        $forceModel = new Set_course();
        $forceModel->execute();
    }
}