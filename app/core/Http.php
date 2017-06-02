<?php

namespace Vertex\Core;

class Http
{
    /**
     * Redirect to the specified url.
     * 
     * @param  string $url 
     * @return void
     */
    public static function redirect($url)
    {
        header('location:' . $url);
        die;
    }
}
