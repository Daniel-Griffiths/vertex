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

        if($routeInfo instanceof Dispatcher\Result\NotMatched) {
            echo $this->error('404', 'Page Could Not Be Found');
            return;
        }

        if($routeInfo instanceof Dispatcher\Result\MethodNotAllowed) {
            echo $this->error('405', 'Method is not allowed');
            return;
        }

        return $this->found($routeInfo[1], $routeInfo[2]);
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
        // its a closure
        if (is_callable($handler)) {
            return $this->handle($handler, $parameters);
        }

        // its a class
        [$class, $method] = explode("@", $handler, 2);
        $class = $this->namespace . $class;

        // inject any dependencies
        $parameters = Container::resolve($class, $method, $parameters);
        $construct = Container::resolve($class, '__construct');

        return $this->handle([new $class(...$construct), $method], $parameters);
    }

    /**
     * Handle the callback.
     * 
     * @param  string $callback   
     * @param  array $parameters 
     */
    public function handle($callback, ...$parameters)
    {
        $result = $callback(...$parameters);

        echo (is_array($result)) ? json_encode($result) : $result;
    }

    /**
     * Error response.
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
