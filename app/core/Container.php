<?php

namespace Vertex\Core;

use ReflectionClass;
use ReflectionParameter;
use ReflectionNamedType;

class Container
{
    /**
     * Inversion of control container, allows methods to request
     * their dependencies rather than passing them
     * to the method directly.
     * 
     * @param string $class
     * @param string $method
     * @param array  $parameters
     * @return array
     */
    public static function resolve(string $class, string $method, array $parameters = []): array
    {
        $reflector = new ReflectionClass($class);
        $reflectedParameters = $reflector->getMethod($method)->getParameters();

        return array_map(function (ReflectionParameter $parameter) use ($parameters) {
            $type = $parameter->getType();
            $reflectedClass = $type instanceof ReflectionNamedType && !$type->isBuiltin() ? $type->getName() : null;

            if (!empty($reflectedClass)) {
                return new $reflectedClass;
            }

            return $parameters[$parameter->name] ?? null;
        }, $reflectedParameters);
    }
}