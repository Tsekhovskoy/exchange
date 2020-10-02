<?php

/**
 * The force course loading controller. Controller calls the "load" method from the Set_course.php model and get all
 * force course records from it.
 * Controller calls from  /js/show_template.js
 */

require_once (ROOT. "/models/Set_course.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Load
 */
class Load extends AbstractController
{
    public function actionLoad() {
        $forceModel = new Set_course();
        $forceModel->load();
    }
}