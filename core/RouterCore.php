<?php

namespace Core;

abstract class RouterCore
{
    private $routes;

    abstract protected function createRoutes();

    public function __construct()
    {
        $this->createRoutes()
            ->start();
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    protected function currentPath()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function start()
    {
        foreach ($this->getRoutes() as $key => $route) {
            $variablePath = substr($this->currentPath(), strlen('/framework-mvc-php'));
            if($variablePath == $route['path'])
            {
                $class = 'App\\Controller\\' . ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }

    }
}