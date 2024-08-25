<?php

namespace Vertex\Core;

use ReflectionClass;

class Container
{
    /**
     * Inversion of control container, allows method's to request
     * thier dependencies rather than passing them
     * to the method directly.
     * 
     * @param string $class
     * @param string $method
     * @param array  $parameters
     */
    public static function resolve(string $class, string $method, array $parameters = [])
    {
        $reflector = new ReflectionClass($class);
        $reflectedParameters = $reflector->getMethod($method)->getParameters();

        return array_map(function ($parameter) use ($parameters) {
            $reflectedClass = @$parameter->getClass()->name;

            if (!empty($reflectedClass)) {
                return new $reflectedClass;
            }

            return $parameters[$parameter->name];
        }, $reflectedParameters);
    }
}
