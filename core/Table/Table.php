<?php

namespace Core\Table;


use App\App;
use Core\Database;

class Table{

    protected $table;
    protected $db;

    public function __Construct(Database $db)
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
       return $this->db->prepare(

           "SELECT * FROM ".$this->table,
           null,

           '\App\Entity\\'.ucfirst($this->table).'Entity'
       );
    }

}