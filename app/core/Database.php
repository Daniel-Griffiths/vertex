<?php

namespace Vertex\Core;

use Vertex\Core\Traits\SingletonTrait;
use Exception;
use PDO;

class Database
{
    use SingletonTrait;

    /**
     * The default PDO connection options.
     * 
     * @var array
     */
    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

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
        if ($config['enabled'] == 'true') {
            $instance = new PDO($this->loadConfig($config), $config['mysql']['username'], $config['mysql']['password'], $this->options);
            return $instance;
        }
    }

    /**
     * Load the configuration.
     * 
     * @param  array  $config 
     * @return string
     */
    public function loadConfig(array $config)
    {
        switch ($config['connection']) {
            case 'mysql':
                return 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'];
            case 'sqlite':
                return 'sqlite:' . __DIR__ . '/database/' . $config['sqlite']['database'] . '.sqlite';
            default:
                throw new Exception('Connection type not supported');
        }
    }
}
