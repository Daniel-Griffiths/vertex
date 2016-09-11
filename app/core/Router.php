<?php

namespace Vertex\Core;

use \FastRoute\Dispatcher;

/*  
|-------------------------------------------------------------------------- 
| Router Class
|--------------------------------------------------------------------------
|
| This acts as a simple wrapper around FastRoute
|
*/

class Router
{

    /**
     * Placeholder for the dispatcher class
     * @var object
     */
    private $dispatcher;

    /**
     * Main controller namespace
     * @var string
     */
    private $namespace = 'Controller\\';

    /**
     * Route Information
     * @var array
     */
    private $routeInfo = [];

    /**
     * Inject any dependencies 
     * @param object $dispatcher 
     */
    public function __construct($dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->routeInfo = $this->routeInfo();
    }

    public function dispatch()
    {
        switch ($this->routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo View::render('404', [
                    'error_number' => '404',
                    'error_message' => 'Page Could Not Be Found'
                ]);
                break;
            case Dispatcher::FOUND:
                $handler = $this->routeInfo[1];
                $parameters = $this->routeInfo[2];

                /* its a closure */
                if (is_callable($handler)) {
                    echo call_user_func_array($handler, $parameters);
                    break;
                }

                /* its a class */
                list($class, $method) = explode("@", $handler, 2);
                $class = $this->namespace . $class;
                echo call_user_func_array(
                        array(
                            new $class,
                            $method
                        ),
                        $parameters
                );
                break;
        }
    }

    /**
     * Strip query string (?foo=bar) and decode URI
     * @param  string $uri 
     * @return string
     */
    private function parseUri($uri)
    {
        return $uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    /**
     * Returns the current route information
     * @return array
     */
    public function routeInfo()
    {
        return $route_info = $this->dispatcher->dispatch(
            $_SERVER['REQUEST_METHOD'],
            $this->parseUri($_SERVER['REQUEST_URI'])
        );
    }
}
