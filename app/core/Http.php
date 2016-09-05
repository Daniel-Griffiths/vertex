<?php

namespace Vertex\Core;

/*
|--------------------------------------------------------------------------
| Http Class
|--------------------------------------------------------------------------
|
| Simply deals with any and all things http related!
|
*/

class Http
{
	/**
	 * Redirect to the specified url
	 * @param  string $url 
	 */
	public static function redirect($url)
	{
		return header('location:' . $url);
	}
}

