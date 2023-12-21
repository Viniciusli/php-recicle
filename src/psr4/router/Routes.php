<?php

namespace PSR4\router;

class Routes
{
    private static $instance;
    private static array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    private function __construct()
    {
        // self::$routes = 
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public static function addRoute(string $method, string $uri, array $action)
    {
        self::$routes[$method][$uri] = fn () => self::load($action);
    }

    public function getRoutes(): array
    {
        return self::$routes;
    }

    private static function load(array $action)
    {
        $controllerInstance = new $action[0]();
        $function = $action[1];
    
        $controllerInstance->$function((object) $_REQUEST);
    }
}