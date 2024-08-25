<?php

namespace Vertex\Core;

use Jenssegers\Blade\Blade;

class View
{
    /**
     * Renders a view.
     * 
     * @param  string $view       
     * @param  array  $parameters 
     * @return \Jenssegers\Blade\Blade
     */
    public static function render(string $view, array $parameters = [])
    {
        $blade = new Blade(__DIR__ . '/../../resources/views/', Config::get('view')['cache']);

        return $blade->make($view, $parameters);
    }
}
