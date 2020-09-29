<?php
/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = ROOT. '/' . $class . '.php';

    if(file_exists($file)) {
        include_once($file);
    }else{
        $file = ROOT. '/controllers/' . $class . '.php';
        if(file_exists($file)) {
            include_once($file);
        }
    }

});