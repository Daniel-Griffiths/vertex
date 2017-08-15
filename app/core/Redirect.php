<?php

namespace Vertex\Core;

class Redirect
{
    /**
     * Redirect to the specified url.
     * 
     * @param  string $url 
     * @return void
     */
    public static function to($url)
    {
	self::createRedirect($url);
    }

    /**
     * Redirect to the previous url.
     * 
     * @return void
     */
    public static function back()
    {
        self::createRedirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Create a new redirect.
     * 
     * @param  string $location 
     * @return void
     */
    protected static function createRedirect($location)
    {
        header('location:' . $location);
    }
}
