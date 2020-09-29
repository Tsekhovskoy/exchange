<?php
/**
 *The main page ("/") input point. Load the force course template (views/template.php)
 */

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once (ROOT . '/app/autoload.php');
use app\Router;

$router = new Router();
$router->run();
