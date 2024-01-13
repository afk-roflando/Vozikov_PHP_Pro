<?php

namespace Core;

class router
{
    static protected array $routes = [], $params = [];

    static protected array $convertTypes = [
        'd' => 'int',
        '.' => 'string'
    ];

    static public function add(string $route, array $params): void
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z_]+):([^}]+)}/', '(?P<$1>$2)', $route);
        $route = "/^$route$/i";

        static::$routes[$route] = $params;
    }

    static public function dispatch(string $uri): void
    {
        $uri = trim($uri, '/');

        if (static::match($uri)) {
            // check HTTP method
            static::checkRequestMethod();

            // get controller
            $controller = static::getController();
            $action = static::getAction($controller);

            if ($controller->before($action, static::$params)) {
                call_user_func_array([$controller, $action], static::$params);
                $controller->after($action);
            }
        }
    }

    static protected function getAction(control $controller): string
    {
        $action = static::$params['action'] ?? null;

        if (!method_exists($controller, $action)) {
            throw new \Exception("$controller doesn't have '$action'");
        }

        unset(static::$params['action']);

        return $action;
    }

    static protected function getController(): control
    {
        $controller = static::$params['controller'] ?? null;

        if (!class_exists($controller)) {
            throw new \Exception("Controller '$controller' doesn't exists!");
        }

        unset(static::$params['controller']);

        return new $controller;
    }

    static protected function checkRequestMethod()
    {
        if (array_key_exists('method', static::$params)) {
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

            if ($requestMethod !== strtolower(static::$params['method'])) {
                throw new \Exception("Method '$requestMethod' is not allowed for this route");
            }

            unset(static::$params['method']);
        }
    }


    static protected function buildParams(string $route, array $matches, array $params): array
    {
        preg_match_all('/\(\?P<[\w]+>(\\\\)?([\w\.][\+]*)\)/', $route, $types);
        $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

        if (!empty($types)) {
            $lastKey = array_key_last($types);
            $step = 0;
            $types[$lastKey] = array_map(fn($value) => str_replace('+', '', $value), $types[$lastKey]);

            foreach ($matches as $name => $match) {
                settype($match, static::$convertTypes[$types[$lastKey][$step]]);
                $params[$name] = $match;
                $step++;
            }
        }

        return $params;
    }
}