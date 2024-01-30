<?php

// use Config\Router;
/**
 * config file of app
 */
require_once __DIR__.'/../config/config.php';

/**
 * resources
 */
require_once __DIR__.'/../resources/functions/dump.php';

Dotenv\Dotenv::createImmutable('../')->load();

/**
 * ServicesPorviders
 */

new App\Providers\DatabaseServiceProvider();

/**
 * System Routes
 */
new Config\Router();
