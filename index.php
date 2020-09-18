<?php
/**
 *The main page ("/") input point. Load the force course template (views/template.php)
 */

define('ROOT', dirname(__FILE__));

require_once ('./views/template.php');
//$url = $_SERVER['REQUEST_URI'];
//$url = trim($url, '/');
//$url = explode('/', $url);
//var_dump($url);