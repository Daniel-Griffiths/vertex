<?php

declare(strict_types=1);

use Vertex\Core\View;
use Vertex\Core\Redirect;
use Illuminate\View\View as BladeView;

/**
 * Dump the specified variables and end the script.
 * 
 * @param  mixed ...$data 
 * @return void
 */
if (!function_exists('dd')) {
    function dd(...$data): void
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
 * @return BladeView
 */
if (!function_exists('view')) {
    function view(string $view, array $parameters = []): BladeView
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
    function redirect(string $url): void
    {
        Redirect::to($url);
    }
}

/**
 * Redirect to the previous page.
 * 
 * @return void
 */
if (!function_exists('back')) {
    function back(): void
    {
        Redirect::back();
    }
}