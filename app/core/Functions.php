<?php

/*
|--------------------------------------------------------------------------
| Global Functions
|--------------------------------------------------------------------------
|
| Declare global helper functions which can be used
| anywhere in the application.
|
*/

/**
 * Renders a view
 * @param  string $view       
 * @param  array  $parameters 
 * @return view
 */
function view(string $view, array $parameters = [])
{
	global $twig;

	$template = $twig->loadTemplate($view . '.html');
	echo $template->render($parameters);
}