<?php

require_once(ROOT . "/app/View.php");
require_once (ROOT . "/controllers/AbstractController.php");

class Errors extends AbstractController
{
    public function actionErrors()
    {
        View::render('error');
    }
}