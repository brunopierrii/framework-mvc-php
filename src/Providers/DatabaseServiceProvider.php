<?php

namespace App\Providers;

use Database\Database;
use Illuminate\Database\Capsule\Manager;

class DatabaseServiceProvider extends Database
{
    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $manager = new Manager();
        
        $manager->addConnection( $this->getParametersConnection() );
        $manager->setAsGlobal();
        $manager->bootEloquent();
    }
}