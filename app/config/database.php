<?php

return [

/*
|--------------------------------------------------------------------------
| Database Connections
|--------------------------------------------------------------------------
|
| This is where the main database details are defined. 
| specify the connection details below.
|
*/
    'enabled' => getenv('DB_ENABLED'),
    'connection' => getenv('DB_CONNECTION'),
    'sqlite' => [
        'database' => getenv('DB_DATABASE')
    ],
    'mysql' => [
        'host' => getenv('DB_HOST'),
        'port' => getenv('DB_PORT'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD')
    ],
];
