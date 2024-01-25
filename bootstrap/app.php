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
require_once __DIR__.'/../resources/helpers.php';

// $getenv = Dotenv\Dotenv::createImmutable('../');
// $getenv->load();

// dd(env('teste'));

/**
 * ServicesPorviders
 */

/**
 * System Routes
 */
new Config\Router();
