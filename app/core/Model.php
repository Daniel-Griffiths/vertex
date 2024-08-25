<?php

namespace Vertex\Core;

abstract class Model
{
    /**
     * The database instance
     * 
     * @var \PDO
     */
    protected \PDO $database;

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected string $table;

    /**
     * Create a new abstract model.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->database = Database::singleton()->connection(Config::get('database'));
    }
}