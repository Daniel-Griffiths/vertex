<?php

namespace Vertex\Core; 

use \FastRoute\Dispatcher;

class Router   
{ 

    /**
     * Placeholder for the dispatcher class.
     * 
     * @var object
     */
    private $dispatcher;

    /**
     * Main controller namespace.
     * 
     * @var string
     */
    private $namespace = 'Vertex\\Controller\\';

    /**
     * Create a new router.
     *
     * @var \FastRoute\simpleDispatcher
     * @return void
     */
    public function __construct($dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Dispatch the route.
     *
     * @return void
     */
    public function dispatch()
    {
        $routeInfo = $this->info();

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo $this->error('404', 'Page Could Not Be Found');
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                echo $this->error('405', 'Method is not allowed');
                break;
            case Dispatcher::FOUND:
                echo $this->found($routeInfo[1], $routeInfo[2]);
                break;
        }
    }

    /**
     * Returns the current route information.
     * 
     * @return array
     */
    public function info()
    {
        return $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtok($_SERVER['REQUEST_URI'], '?'));
    }

    /**
     * Check if a route was found.
     * 
     * @param  string $handler    
     * @param  array $parameters 
     */
    private function found($handler, $parameters)
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
     * Handle the callback.
     * 
     * @param  string $callback   
     * @param  array $parameters 
     */
    public function handle($callback, ...$parameters)
    {
        $callback = call_user_func_array($callback, ...$parameters);
        
        echo (is_array($callback)) ? json_encode($callback) : $callback;
    }

    /**
     * Error responce.
     * 
     * @param  string $type        
     * @param  string $description 
     */
    private function error($type, $description)
    {
        return View::render('errors.request', [
            'title' => $type,
            'error_number' => $type,
            'error_message' => $description
        ]);        
    }
}
