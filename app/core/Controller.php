<?php

namespace Vertex\Core;

abstract class Controller
{
    protected ?Database $database;

    /**
     * Create a new abstract controller.
     * 
     * @return void
     */
    public function __construct()
    {
    }
}
