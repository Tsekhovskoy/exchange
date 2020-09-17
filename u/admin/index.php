<?php
/**
 * The admin page ("/u/admin") input point. Load the authorisation form (views/auth.php)
 */

set_include_path($_SERVER['DOCUMENT_ROOT'] . "/exchange");
session_start();

if(isset($_SESSION['user'])) {
    require_once('views/set_course.php');
} else {
    require_once('views/auth.php');
}