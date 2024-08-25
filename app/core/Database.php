<?php

namespace Vertex\Core;

use PDO;
use Vertex\Core\Traits\SingletonTrait;

class Database
{
    use SingletonTrait;

    /**
     * The default PDO connection options.
     * 
     * @var array
     */
    protected array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];

    /**
     * Connect to the appropriate database
     * based on the details specified in
     * the configuration file.
     * 
     * @param  array  $config 
     * @return PDO     
     */
    public function connection(array $config): PDO
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
    protected function getDsn(array $config): string
    {
        return match ($config['connection']) {
            'mysql' => 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'],
            'sqlite' => 'sqlite:' . $config['sqlite']['database'] . '.sqlite',
            default => throw new \Exception('Connection type not supported'),
        };
    }
}