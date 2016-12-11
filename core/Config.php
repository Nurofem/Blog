<?php

namespace Core;


class Config{

    protected static  $setting = [];
    protected  static $_instance;

    public function __Construct()
    {
     
        if(self::$setting == null)
        {
            self::$setting = require str_replace('\\', '/' , dirname(__DIR__).'/config/config.php');
        }
        
    }

    public static function getInstance()
    {
        if(self::$_instance == null)
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function get($key)
    {
        
        if(!isset(self::$setting[$key]))
        {
            return null;
        }
        return self::$setting[$key];

    }

}
