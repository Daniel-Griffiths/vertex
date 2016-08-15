<?php

namespace Vertex\Core;

/**
 * Main Controller class that all
 * other Controllers extend
 */
abstract class Controller
{
    protected $database;

    public function __construct()
    {
        //$this->database = (new Database)->connection(
        //    Config::get('database')
        //);
    }
}
