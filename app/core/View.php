<?php

namespace App\Core;

use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
	/**
	 * Renders a view
	 * @param  string $view       
	 * @param  array  $parameters 
	 * @return view
	 */
	public static function render(string $view, array $parameters = [])
	{
		$loader = new Twig_Loader_Filesystem(__DIR__.'/../views/');
		$twig   = new Twig_Environment($loader, Config::get('view')['cache']);

		$template = $twig->loadTemplate($view . '.html');
		echo $template->render($parameters);
	}
}