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

    'connections' => [
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
    ],
];
