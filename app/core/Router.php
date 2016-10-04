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
    private $namespace = 'Vertex\\Controller\\';

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
    }

    /**
     * Dispatch
     */
    public function dispatch()
    {
        $this->routeInfo = $this->routeInfo();

        switch ($this->routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo $this->routeNotFound();
                break;
            case Dispatcher::FOUND:
                echo $this->routeFound($this->routeInfo[1], $this->routeInfo[2]);
                break;
        }
    }

    /**
     * Route Found
     * @param  string $handler    
     * @param  array $parameters 
     */
    private function routeFound($handler, $parameters)
    {
        /* its a closure */
        if (is_callable($handler)) {
            return $this->handle($handler, $parameters);
        }

        /* its a class */
        list($class, $method) = explode("@", $handler, 2);
        $class = $this->namespace . $class;
        return $this->handle([new $class, $method], $parameters);        
    }

    /**
     * Route Not Found
     */
    private function routeNotFound()
    {
        return View::render('errors.404', [
            'title' => '404',
            'error_number' => '404',
            'error_message' => 'Page Could Not Be Found'
        ]);        
    }

    /**
     * Handle the callback
     * @param  string $callback   
     * @param  array $parameters 
     */
    public function handle($callback, ...$parameters)
    {
        $callback = call_user_func_array($callback, $parameters);
        
        if(is_array($callback)){
            echo json_encode($callback);
        } else {
            echo $callback;      
        }
    }

    /**
     * Strip query string (?foo=bar) and decode URI
     * @param  string $uri 
     * @return string
     */
    public function parseUri($uri)
    {
        return $uri = rawurldecode(parse_url($uri, PHP_URL_PATH));
    }

    /**
     * Returns the current route information
     * @return array
     */
    public function routeInfo()
    {
        return $this->dispatcher->dispatch(
            $_SERVER['REQUEST_METHOD'],
            $this->parseUri($_SERVER['REQUEST_URI'])
        );
    }
}
