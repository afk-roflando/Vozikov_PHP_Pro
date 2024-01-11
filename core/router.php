<?php

namespace core;

class router
{
    static protected array $router =[], $params =[];
    static public function add(string $router, array $params): void
    {
        static :: $router[$router] = $params;
    }
    static public function dispatch(string $uri): void
    {
    }
}
