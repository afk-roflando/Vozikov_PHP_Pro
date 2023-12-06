<?php
require_once __DIR__ .'/vendor/autoload.php';

interface Eater
{
    public function eat();
}

interface Flyer
{
    public function fly();
}

class Swallow implements Eater, Flyer
{
    public function eat() {}
    public function fly() {}
}

class Ostrich implements Eater
{
    public function eat() {}
}