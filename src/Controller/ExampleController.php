<?php

namespace App\Controller;

use Core\AbstractController;
use Core\HttpFoundation\Response;

class ExampleController extends AbstractController
{
    public function example() : Response
    {
        return new Response('<h1>Content Example</h1>');
    }
}