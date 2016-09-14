<?php

require __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Vertex\Core\View;

class ViewTest extends TestCase
{
    public function testViewRender()
    {
        $this->assertNotEmpty(View::render('example'),'test');
    }

    /**
     * @expectedException Twig_Error_Loader
     */
    public function testViewThrowException()
    {
        View::render('fake-view-that-should-really-not-exist-4738274382');
    }
}
