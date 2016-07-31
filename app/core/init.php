<?php

/*
|--------------------------------------------------------------------------
| Errors
|--------------------------------------------------------------------------
|
| Show all php errors
|
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
session_start();

/*
|--------------------------------------------------------------------------
| Load Vendor Code
|--------------------------------------------------------------------------
|
| Autoload all vendor files
|
*/

require __DIR__.'/../../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Global Functions
|--------------------------------------------------------------------------
|
| Load all global helper functions
|
*/

require __DIR__.'/functions.php';

/*
|--------------------------------------------------------------------------
| Load Enviroment Variables
|--------------------------------------------------------------------------
|
| Read the env file and get all the enviroment variables
|
*/

(new Dotenv\Dotenv(__DIR__.'/../..'))->load();

/*
|--------------------------------------------------------------------------
| Load Configuration
|--------------------------------------------------------------------------
|
| Get the core configuration variables
|
*/

require __DIR__.'/../config.php';

/*
|--------------------------------------------------------------------------
| Load Views
|--------------------------------------------------------------------------
|
| Instantiate an instance of twig
|
*/

$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__.'/../views/'), array(
    //'cache' => __DIR__.'/cache/views/',
    'cache' => false,
));

/*
|--------------------------------------------------------------------------
| Database Connection
|--------------------------------------------------------------------------
|
| ...
|
*/

/*
|--------------------------------------------------------------------------
| Load Routes
|--------------------------------------------------------------------------
|
| Include all the specified routes for the application
|
*/

require __DIR__.'/../routes.php';



