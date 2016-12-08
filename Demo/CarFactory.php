<?php

namespace Demo;

class CarFactory{


    public static function getCar($class)
    {
        $class = ucfirst($class);
        $method = __NAMESPACE__.'\Car'.$class;
        return new $method();
    }



}