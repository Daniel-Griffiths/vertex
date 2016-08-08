<?php

namespace Vertex\Core;

use PDO;

class Database
{
    public function connection(array $config)
    {
    	# Still a work in progress. 
    	# Currently hard coded to use mysql.
    	
        try {
            $instance = new PDO('mysql:host=' . $config['connections']['mysql']['host'] . ';
            					 dbname=' . $config['connections']['mysql']['database'], 
            					 $config['connections']['mysql']['username'], 
            					 $config['connections']['mysql']['password']);
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $instance;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
