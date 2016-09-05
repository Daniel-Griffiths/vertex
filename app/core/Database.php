<?php

namespace Vertex\Core;

use Exception;
use PDO;

/*  
|-------------------------------------------------------------------------- 
| Database Class
|--------------------------------------------------------------------------
|
| Allows your app to connect to the database. You can 
| disable this in the configuration file if 
| database functionality is not needed.
|
*/

class Database
{
    /**
     * Connect to the appropriate database
     * based on the details specified in
     * the configuration file
     * 
     * @param  array  $config 
     * @return PDO       
     */
    public function connection(array $config)
    {   
        if($config['enabled'] == 'true'){
            try {
                $instance = new PDO($this->loadConfig($config),$config['mysql']['username'],$config['mysql']['password']);
                $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $instance;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    /**
     * Load the configuration
     * @param  array  $config 
     * @return PDO
     */
    public function loadConfig(array $config)
    {
        switch ($config['connection']) {
            case 'mysql':
                return $connection = 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'];
            case 'sqlite':
                return $connection = 'sqlite:' . __DIR__ . '/database/' . $config['sqlite']['database'] . '.sqlite';
            default:
                throw new Exception('Connection type not supported');
        }        
    }
}
