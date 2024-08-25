<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Config;
use Vertex\Core\View;

class ViewTest extends TestCase
{
    public function testViewRender()
    {
        $this->assertNotEmpty(View::render('errors.request'), 'test');
    }

    public function testViewThrowException()
    {
        $this->expectException(InvalidArgumentException::class);

        View::render('fake-view-that-should-really-not-exist-4738274382');
    }
}
