<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Config;
use Vertex\Core\View;

class ViewTest extends TestCase
{
    // public function testViewRender()
    // {
    //     $this->assertNotEmpty(View::render('errors.404'),'test');
    // }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testViewThrowException()
    {
        View::render('fake-view-that-should-really-not-exist-4738274382');
    }
}
