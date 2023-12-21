<?php

namespace PSR4\router;

use Exception;

class Router
{
    private Routes $routes;

    public function __construct()
    {
        $this->routes = Routes::getInstance();
    }

    public function get(string $uri, array $action)
    {
        $this->validaAction($action);
        
        $this->routes->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action)
    {
        $this->validaAction($action);

        $this->routes->addRoute('POST', $uri, $action);
    }

    private function validaAction(array $action)
    {
        if (!(isset($action[0], $action[1]))) {
            throw new Exception("Action inválida");
        }

        if (!class_exists($action[0])) {
            throw new Exception("O Controller {$action[0]} não existe");
        }

        $controllerInstance = new $action[0]();

        if (!method_exists($controllerInstance, $action[1])) {
            throw new Exception("O método {$action[1]} não existe no controller {$action[0]}");
        }
    }
}