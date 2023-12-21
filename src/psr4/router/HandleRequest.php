<?php

namespace PSR4\router;

use Exception;

class HandleRequest
{
    public Routes $routes;

    public function __construct()
    {
        $this->routes = Routes::getInstance();
    }

    public function handle()
    {
        try {
            $routes = $this->routes->getRoutes();
            $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
            $method = $_SERVER['REQUEST_METHOD'];
            
            if (!(isset($routes[$method]))) {
                throw new Exception('A rota não existe');
            }
        
            if (!array_key_exists($uri, $routes[$method])) {
                throw new Exception('A rota não existe');
            }

            $this->run($routes[$method][$uri]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function run($action)
    {
        $action();
    }
}