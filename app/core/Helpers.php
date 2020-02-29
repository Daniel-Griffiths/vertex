<?php

use Vertex\Core\View;
use Vertex\Core\Redirect;

/**
 * Dump the specified variables and end the script.
 * 
 * @param  mixed $data 
 * @return void
 */
if (!function_exists('dd')) {
	function dd(...$data)
	{
		var_dump(...$data);
		die;
	}
}

/**
 * Renders a view.
 * 
 * @param  string $view       
 * @param  array  $parameters 
 * @return \Jenssegers\Blade\Blade
 */
if (!function_exists('view')) {
	function view(string $view, array $parameters = [])
	{
		return View::render($view, $parameters);
	}
}

/**
 * Redirect to the specified url.
 * 
 * @param  string $url 
 * @return void
 */
if (!function_exists('redirect')) {
	function redirect($url)
	{
		return Redirect::to($url);
	}
}

/**
 * Redirect to the previous page.
 * 
 * @return void
 */
if (!function_exists('back')) {
	function back()
	{
		return Redirect::back();
	}
}
