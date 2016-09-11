<?php

require __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Vertex\Core\Database;

class DatabaseTest extends TestCase
{
    public function testConnectUsingMysql()
    {
        $connection = [
            'enabled' => true,
            'connection' => 'mysql',
            'mysql' => [
                'host' => getenv('DB_HOST'),
                'port' => getenv('DB_PORT'),
                'database' => getenv('DB_DATABASE'),
                'username' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD')
            ],
        ];

        $database = new Database;

        $this->assertInstanceOf('PDO', $database->connection($connection));
    }

    public function testConnectUsingSqlite()
    {
        $connection = [
            'enabled' => true,
            'connection' => 'sqlite',
            'sqlite' => [
                'database' => getenv('DB_DATABASE')
            ]
        ];

        $database = new Database;

        $this->assertInstanceOf('PDO', $database->connection($connection));
    }

    /**
     * @expectedException     Exception
     */
    public function testConnectionShouldThrowException()
    {
        $connection = [
            'enabled' => true,
            'connection' => 'driver_that_doesnt_exist',
        ];

        $database = new Database;

        $database->connection($connection);
    }
}
