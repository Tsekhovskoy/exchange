<?php

require_once (ROOT . "/app/View.php");

class Template
{
    public function actionTemplate() {
        View::render('template');
    }
}