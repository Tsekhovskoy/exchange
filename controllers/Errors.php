<?php
/**
 * The errors class call error-view if entered URL is incorrect
 */

require_once(ROOT . "/app/View.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Errors
 */
class Errors extends AbstractController
{
    public function actionErrors()
    {
        View::render('error');
    }
}