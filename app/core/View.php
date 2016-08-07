<?php

namespace App\Core;

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
		$twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__.'/../views/'), array(
		    //'cache' => __DIR__.'/cache/views/',
		    'cache' => false,
		));

		$template = $twig->loadTemplate($view . '.html');
		echo $template->render($parameters);
	}
}