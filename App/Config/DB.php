<?php

namespace App\config;

class DB
{
    // DSN
    public static $host       = "127.0.0.1";
    public static $db_name    = "";
    public static $user_name  = "";
    public static $password   = "";
    
    // Default DB configuration
    const DEFAULT_SETTINGS = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_PERSISTENT => true
    ];
    const DEFAULT_CHARSET ="utf8";

    // Миграции
    protected function createMigration()
    {

    }
}
