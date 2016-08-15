<?php

namespace Vertex\Core;

use Exception;
use PDO;

/**
 * Database Class
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
        try {
            switch ($config['connection']) {
                case 'mysql':
                    $connection = 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'];
                    break;
                case 'sqlite':
                    $connection = 'sqlite:' . __DIR__ . '/database/' . $config['sqlite']['database'] . '.sqlite';
                    break;
                default:
                    throw new Exception('Connection type not supported');
            }
            $instance = new PDO($connection,$config['mysql']['username'],$config['mysql']['password']);
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $instance;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
