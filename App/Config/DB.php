<?php

namespace App\config;

class DB
{
    // DSN
    const HOST = "127.0.0.1";
    const NAME = "";
    const USER = "";
    const PASSWORD = "";

    // Default DB configuration
    const DEFAULT_SETTINGS = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_PERSISTENT => true
    ];
    const DEFAULT_CHARSET ="utf8";
}
