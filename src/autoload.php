<?php

function __autoload($className) {
    $className = __DIR__.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $className).".php";
    if (file_exists($className)) {
        require_once($className);
    } else {
        echo "Class {$className} not found";
        die();
    }
 }
