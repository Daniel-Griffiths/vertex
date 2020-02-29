<?php

use PHPUnit\Framework\TestCase;
use Vertex\Core\Redirect;

class RedirectTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testRedirectTo()
    {
        Redirect::to('http://google.com');
    }
}
