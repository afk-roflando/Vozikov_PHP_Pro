<?php

namespace Core;

use PDO;

class Db
{
    protected static PDO|null $instance = null;



    static public function connect(): PDO
    {
        if (is_null(static::$instance))
        {
            $dsn = "mysql:host=base;dbname=mvc_db";
            $options =
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
            static::$instance = new PDO
            (
                $dsn,
                'root',
                'KJKszpj',
                $options
            );
        }
        return static::$instance;
    }
}
