<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/");

spl_autoload_register(function ($class) {
    $file = ROOT . str_replace("\\", "/", $class) . ".php";
    if (file_exists($file)) {
        require ($file);
    }
});