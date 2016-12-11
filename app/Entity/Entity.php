<?php

namespace App\Entity;

class Entity{

    public function __get($key)
    {
        $method = 'get'.ucfirst($key);
        
        return $this->$method();
        
    }



}