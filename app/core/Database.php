<?php

namespace Vertex\Core;

use Vertex\Core\Traits\SingletonTrait;
use Exception;
use PDO;

class Database
{
    use SingletonTrait;

    /**
     * Connect to the appropriate database
     * based on the details specified in
     * the configuration file.
     * 
     * @param  array  $config 
     * @return PDO       
     */
    public function connection(array $config)
    {
        if ($config['enabled'] == 'false') {
            return false;
        }

        try{
            $instance = new PDO($this->loadConfig($config), $config['mysql']['username'], $config['mysql']['password']);
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $instance;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Load the configuration.
     * 
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
