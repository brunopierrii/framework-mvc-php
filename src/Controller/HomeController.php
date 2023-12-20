<?php

namespace App\Controller;

use Core\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->json([
            'controller' => 'HomeController',
            'action' => 'index'
        ]);
    }
}