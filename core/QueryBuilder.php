<?php

namespace Core;


class QueryBuilder{

    protected $colomns = [];
    protected $conditions = [];
    protected $table;

    public function select()
    {
        $this->colomns = func_get_args();
        return $this;
    }

    public function where()
    {
        foreach(func_get_args() as $arg)
        {
            $this->conditions[] = $arg;
        }
        return $this;
    }

    public function from($table , $alias= null)
    {
        if($alias === null)
        {
            $this->table = $table;
        }else{
            $this->table = $table.' AS '.$alias;
        }
  
        return $this;
    }

    public function get()
    {
       var_dump( "SELECT ".implode(',' , $this->colomns)
                ." FROM ".$this->table
                ." WHERE ".implode(' AND ', $this->conditions));
    }


}