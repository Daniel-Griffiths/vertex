<?php

namespace Vertex\Core;

/*  
|-------------------------------------------------------------------------- 
| Controller Class
|--------------------------------------------------------------------------
|
| This is the base controller class which all other controllers
| must extend. This allows us to inject any core functionaly 
| which we may want to provide to the controllers.
|
*/

abstract class Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = (new Database)->connection(
           Config::get('database')
        );
    }
}
