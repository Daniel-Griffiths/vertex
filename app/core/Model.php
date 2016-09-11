<?php

namespace Vertex\Core;

/*  
|-------------------------------------------------------------------------- 
| Model Class
|--------------------------------------------------------------------------
|
| This is the base model class which all other models
| must extend. This allows us to inject any core functionaly 
| which we may want to provide to the models.
|
*/

abstract class Model
{
    protected $database;

    public function __construct()
    {
        $this->database = (new Database)->connection(
           Config::get('database')
        );
    }
}
