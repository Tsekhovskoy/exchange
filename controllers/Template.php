<?php

/**
 * Template class calls template rendering
 */
require_once (ROOT . "/app/View.php");
require_once (ROOT . "/controllers/AbstractController.php");

/**
 * Class Template
 */
class Template extends AbstractController
{
    public function actionTemplate() {
        View::render('template');
    }
}