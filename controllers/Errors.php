<?php

require_once(ROOT . "/app/View.php");

class Errors
{
    public function actionErrors()
    {
        View::render('error');
    }
}