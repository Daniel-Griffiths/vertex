<?php

namespace Vertex\Core;

/*  
|-------------------------------------------------------------------------- 
| Config Class
|--------------------------------------------------------------------------
|
| Simply deals with any and all things config related!
|
*/

class Config
{
    /**
     * Returns an array of all settings
     * from the specified file
     * 
     * @param  string $file 
     * @return array       
     */
    public static function get(string $file)
    {
        return require __DIR__.'/../config/' . $file . '.php';
    }
}
