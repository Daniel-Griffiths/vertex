<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Database;

class DatabaseTest extends TestCase
{
    public function testConnectionDisabled()
    {
        $this->assertFalse(
        	(new Database)->connection(['enabled' => 'false'])
        );
    }
}