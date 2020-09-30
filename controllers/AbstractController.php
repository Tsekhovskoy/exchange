<?php

/**
 * Class AbstractController
 * The parent class for controllers
 */
class AbstractController
{
    public function redirect($url = '/') {
        header("Location: {$url}");
        exit();
    }
}