<?php

class AbstractController
{
    public function redirect($url = '/') {
        header("Location: {$url}");
        exit();
    }
}