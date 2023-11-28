<?php

namespace Config;

use Core\RouterCore;

class Router extends RouterCore
{
    protected function createRoutes()
    {
        $routes['index'] = [
            'path' => '/',
            'controller' => 'HomeController',
            'action' => 'index'
        ];

        $this->setRoutes($routes);

        return $this;
    }
}