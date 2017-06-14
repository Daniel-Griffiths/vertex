<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Database;

class DatabaseTest extends TestCase
{
    public function testExpectException()
    {
        $this->expectException(Exception::class);
        (new Database)->connection(['connection' => 'test']);
    }
}