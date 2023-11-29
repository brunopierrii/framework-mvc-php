<?php

namespace Core;

abstract class RouterCore
{
    private $uri;
    private $method;
    private $routesArr;

    abstract protected function createRoutes();

    public function __construct()
    {
        $this->start()
             ->createRoutes()
             ->execute();
    }

    public function setRoutes(array $routes)
    {
        $this->routesArr = $routes;
    }

    public function getRoutes()
    {
        return $this->routesArr;
    }

    protected function get(string $path, array $action = null)
    {
        $this->routesArr[] = [
            'path' => $path,
            'controller' => $action[0],
            'action' => $action[1],
            'method' => 'GET'
        ];
    }

    protected function post(string $path, array $action)
    {
        $this->routesArr[] = [
            'path' => $path,
            'controller' => $action[0],
            'action' => $action[1],
            'method' => 'POST'
        ];
    }

    protected function start()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];

        if(strpos($uri, '?')) {
            $uri = mb_substr($uri, 0, strpos($uri, '?'));
        }

        $uriExplode = explode('/', $uri);

        $uri = self::uriFormat($uriExplode);

        unset($uri[0]);

        $this->uri = implode('/', self::uriFormat($uri));

        return $this;
    }

    private function execute()
    {
        foreach ($this->getRoutes() as $route) {
            if ($this->method !== $route['method']) {
                
                header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: ' . $route['method']);
                echo 'Erro 405: Método HTTP incorreto. Use ' . $route['method'];

                return;
            }

            $path = substr($route['path'], 1);

            if(substr($path, -1) == '/') {
                $path = substr($path, 0, -1);
            }

            if($path == $this->uri) {
                $this->executeController($route['controller'], $route['action']);
            } else {
                echo 'route not found';
            }

        }
    }

    private function executeController(string $controller, string $action)
    {
        $class = 'App\\Controller\\' . ucfirst($controller);

        if(!class_exists($class)) {
            echo 'Class not found';
            return;
        }

        if(!method_exists($class, $action)) {
            echo 'Function not found';
            return;
        }
        
        $object = new $class;
        $object->$action();
    }

    private static function uriFormat(array $arr)
    {
        return array_values(array_filter($arr));
    }

    protected function currentPath()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}