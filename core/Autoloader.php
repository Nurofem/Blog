<?php

namespace Core;


class Autoloader{


    public static function register()
    {
    
        spl_autoload_register([__CLASS__ , 'autoload']);
    }


    public static function autoload($class)
    {
            
         $class = ucfirst($class);
      
        
         require dirname(__DIR__).'\\'.$class.'.php';
    }

 
}