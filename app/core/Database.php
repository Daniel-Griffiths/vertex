<?php

namespace Vertex\Core;

use Vertex\Core\Traits\SingletonTrait;
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
     * @return PDO|bool       
     */
    public function connection(array $config)
    {
        return new PDO(
            $this->getDsn($config), 
            $config['mysql']['username'], 
            $config['mysql']['password'], 
            $this->options
        );
    }

    /**
     * Get the data source name.
     * 
     * @param  array  $config 
     * @return string
     */
    protected function getDsn(array $config)
    {
        switch ($config['connection']) {
            case 'mysql':
                return 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'];
            case 'sqlite':
                return 'sqlite:' . $config['sqlite']['database'] . '.sqlite';
            default:
                throw new \Exception('Connection type not supported');
        }
    }
}
