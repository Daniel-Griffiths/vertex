<?php

namespace Vertex\Core;

use Jenssegers\Blade\Blade;
use Illuminate\View\View as BladeView;

class View
{
    /**
     * Renders a view.
     * 
     * @param  string $view       
     * @param  array  $parameters 
     * @return BladeView
     */
    public static function render(string $view, array $parameters = []): BladeView
    {
            $blade = new Blade(__DIR__ . '/../../resources/views/', Config::get('view')['cache']);
            return $blade->make($view, $parameters);
    }
}