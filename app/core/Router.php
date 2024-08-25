<?php

namespace Vertex\Core;

use FastRoute\Dispatcher;
use FastRoute\Dispatcher\Result\{
    Matched,
    NotMatched,
    MethodNotAllowed
};

class Router
{
    /**
     * Placeholder for the dispatcher class.
     * 
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    /**
     * Main controller namespace.
     * 
     * @var string
     */
    private string $namespace = 'Vertex\\Controller\\';

    /**
     * Create a new router.
     *
     * @param Dispatcher $dispatcher
     * @return void
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Dispatch the route.
     *
     * @return void
     */
    public function dispatch(): void
    {
        $routeInfo = $this->info();

        if ($routeInfo instanceof NotMatched) {
            echo $this->error('404', 'Page Could Not Be Found');
            return;
        }

        if ($routeInfo instanceof MethodNotAllowed) {
            echo $this->error('405', 'Method is not allowed');
            return;
        }

        $this->found($routeInfo[1], $routeInfo[2]);
    }

/**
 * Returns the current route information.
 * 
 * @return  Matched|NotMatched|MethodNotAllowed
 */
public function info():  Matched|NotMatched|MethodNotAllowed
{
    return $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtok($_SERVER['REQUEST_URI'], '?'));
}

    /**
     * Check if a route was found.
     * 
     * @param  string $handler    
     * @param  array $parameters 
     * @return void
     */
    private function found(string $handler, array $parameters): void
    {
        // its a closure
        if (is_callable($handler)) {
            $this->handle($handler, $parameters);
            return;
        }

        // its a class
        [$class, $method] = explode("@", $handler, 2);
        $class = $this->namespace . $class;

        // inject any dependencies
        $parameters = Container::resolve($class, $method, $parameters);
        $construct = Container::resolve($class, '__construct');

        $this->handle([new $class(...$construct), $method], $parameters);
    }

    /**
     * Handle the callback.
     * 
     * @param  callable $callback   
     * @param  array $parameters 
     * @return void
     */
    public function handle(callable $callback, ...$parameters): void
    {
        $result = $callback(...$parameters);

        echo is_array($result) ? json_encode($result) : $result;
    }

    /**
     * Error response.
     * 
     * @param  string $type        
     * @param  string $description 
     * @return string
     */
    private function error(string $type, string $description): string
    {
        return View::render('errors.request', [
            'title' => $type,
            'error_number' => $type,
            'error_message' => $description
        ]);
    }
}