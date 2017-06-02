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
	 * @var mixed $parameters
  	 * @return object
  	 */
    public static function singleton(...$parameters)
    {
        if (!isset(self::$instance)) {
        	$class = __CLASS__;
            self::$instance = new $class(...$parameters);
        }
        return self::$instance;
    }
}