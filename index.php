<?php
/**
 *The application's input point.
 */

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once (ROOT . '/app/Router.php');

$router = new Router();
$router->run();
