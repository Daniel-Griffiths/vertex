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
    public static function resolve($class, $method, $parameters = [])
    {
        $reflector = new ReflectionClass($class);
        $reflectedParameters = $reflector->getMethod($method)->getParameters();
        $resolvedParameters = [];

        foreach($reflectedParameters as $parameter)
        {
            $reflectedClass = @$parameter->getClass()->name;

            if(!empty($reflectedClass)){
            	$reflectedClass = $reflectedClass;
            	$resolvedParameters[] = new $reflectedClass;
            } else {
            	$resolvedParameters[] = $parameters[$parameter->name]; 
            }
        }  
        return  $resolvedParameters;    
    }
}
