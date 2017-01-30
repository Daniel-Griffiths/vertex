<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Config;

class ConfigTest extends TestCase
{
    public function testGetsConfig()
    {
        $this->assertNotEmpty(
            Config::get('view')
        );
    }
}
