<?php

namespace App\Controller;

use Core\AbstractController;
use Core\HttpFoundation\JsonResponse;
use Core\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(): Response
    {
        return $this->json([
            'controller' => 'HomeController',
            'action' => 'index'
        ]);
    }

}