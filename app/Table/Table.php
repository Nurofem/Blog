<?php

namespace App\Table;


use App\App;

class Table{

    protected $table;
    protected $db;

    public function __Construct(\App\Database $db)
    {
        $this->db = $db;
        if(is_null($this->table))
        {
             $path = explode('\\', get_class($this));
             $class = end($path);

             $class = str_replace('table', '',strtolower($class));
            
             $this->table = $class;
        }
       
    }

    public function all()
    {
        return $this->db->prepare();
    }

}