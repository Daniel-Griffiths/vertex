<?php

/*
|--------------------------------------------------------------------------
| Show All Errors
|--------------------------------------------------------------------------
|
*/

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Set Default Timezone
|--------------------------------------------------------------------------
|
*/

date_default_timezone_set('Europe/London');

/*
|--------------------------------------------------------------------------
| Import Namespaces
|--------------------------------------------------------------------------
|
*/

use Dotenv\Dotenv;
use Vertex\Core\Router;
use Whoops\Run as Whoops;
use Whoops\Handler\PrettyPageHandler;

/*
|--------------------------------------------------------------------------
| Start Sessions
|--------------------------------------------------------------------------
|
*/

session_start();

/*
|--------------------------------------------------------------------------
| Load Vendor Code
|--------------------------------------------------------------------------
|
*/

require __DIR__ . '/../../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Enviroment Variables
|--------------------------------------------------------------------------
|
*/

$dotenv = Dotenv::createMutable(__DIR__ . '/../..');
$dotenv->load();

/*
|--------------------------------------------------------------------------
| Register Whoops error handler
|--------------------------------------------------------------------------
|
*/

(new Whoops)->pushHandler(new PrettyPageHandler)->register();

/*
|--------------------------------------------------------------------------
| Load Routes
|--------------------------------------------------------------------------
|
| Include all the specified routes for the application
|
*/

$router = new Router(
    FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
        foreach (glob(__DIR__ . '/../../routes/*.php') as $file) {
            require $file;
        }
    })
);

$router->dispatch();
