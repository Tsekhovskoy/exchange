<?php

use app\View;

class Template
{
    public function actionTemplate() {
        View::render('template');
    }
}