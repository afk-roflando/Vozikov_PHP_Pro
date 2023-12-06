<?php
require_once __DIR__ .'/vendor/autoload.php';

interface Database
{
    public function getData();
}

class Mysql implements Database
{
    public function getData()
    {
        return 'some data from MySQL database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(Database $database)
    {
        $this->adapter = $database;
    }

    public function getData()
    {
        return $this->adapter->getData();
    }
}