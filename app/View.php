<?php

/**
 * Class View
 * @package app
 * The render method call given view
 */
class View
{
    public static function render($name) {

        require_once (ROOT . "/views/$name.php");

    }
}