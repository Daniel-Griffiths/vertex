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
	/**
	 * The database instance
	 * @var PDO
	 */
    protected $database;

    /**
     * The table associated with the model
     * @var string
     */
    protected $table;

	/**
	 * Create a new model instance
	 */
    public function __construct()
    {
        $this->database = (new Database)->connection(Config::get('database'));
    }

    /**
     * Return all results from the specified table
     * @param  string $table 
     * @return object     
     */
    public function all()
    {
    	$result = $this->database->query('SELECT * FROM `'.$this->table.'`');
    	return $result->fetchAll();
    }
}
