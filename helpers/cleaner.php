<?php

/**
 * Class Cleaner
 * Do a security checking of $_POST-given parameters
 * Class calls from Auth_model.php, Delete_course.php and Set_course.php models
 */
class Cleaner
{
    public static function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}