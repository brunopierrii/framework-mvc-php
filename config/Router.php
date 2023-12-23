<?php

namespace Config;

use Core\RouterCore;

class Router extends RouterCore
{
    protected function createRoutes()
    {
        $this->get('/', ['HomeController', 'index']);
        $this->get('/example', ['ExampleController', 'example']);

        return $this;
    }
}