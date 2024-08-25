<?php

namespace Vertex\Core;

class Config
{
    /**
     * Returns an array of all settings
     * from the specified file.
     * 
     * @param  string $file 
     * @return array       
     */
    public static function get(string $file): array
    {
        return require __DIR__ . '/../../config/' . $file . '.php';
    }
}
