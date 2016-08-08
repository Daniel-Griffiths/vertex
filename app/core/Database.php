<?php

namespace Vertex\Core;

use Exception;
use PDO;

class Database
{
    public function connection(array $config)
    {
        try {
            switch ($config['connection']) {
                case 'mysql':
                    $connection = 'mysql:host=' . $config['mysql']['host'] . ';dbname=' . $config['mysql']['database'] . $config['mysql']['username'] .$config['mysql']['password'];
                    break;
                case 'sqlite':
                    $connection = 'sqlite:' . __DIR__ . '/database/' . $config['mysql']['database'] . '.sqlite';
                    break;
                default:
                    throw new Exception('Connection type not supported');
            }
            $instance = new PDO($connection);
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $instance;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
