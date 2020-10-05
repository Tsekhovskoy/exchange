<?php

require_once (ROOT . "/app/View.php");

/**
 * Class AbstractController
 * The parent class for controllers
 */
class AbstractController
{
    public $view;

    public function __construct() {
        $this->view = new View();
    }
    public function redirect($url = '/') {
        header("Location: {$url}");
        exit();
    }
}

