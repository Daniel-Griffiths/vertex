<?php

namespace Vertex\Core\Traits;

trait SingletonTrait
{
    /**
     * The instance of the class.
     * 
     * @var object
     */
    protected static $instance;

    /**
     * Fetch the instance of the class.
     *
     * @param mixed ...$parameters
     * @return static
     */
    public static function singleton(mixed ...$parameters): static
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class(...$parameters);
        }

        return self::$instance;
    }
}