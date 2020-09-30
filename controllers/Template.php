<?php

require_once (ROOT . "/app/View.php");
require_once (ROOT . "/controllers/AbstractController.php");

class Template extends AbstractController
{
    public function actionTemplate() {
        View::render('template');
    }
}