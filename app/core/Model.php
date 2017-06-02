<?php

namespace Vertex\Core;

abstract class Model
{
	/**
	 * The database instance
     * 
	 * @var PDO
	 */
    protected $database;

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table;

    /**
     * Create a new abstract model.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->database = (new Database)->connection(Config::get('database'));
    }
}
