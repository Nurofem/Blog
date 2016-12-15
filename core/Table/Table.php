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

           "SELECT * FROM ".$this->table , 
           null,

           '\App\Entity\\'.ucfirst($this->table).'Entity'
       );
    }

    public function pluck($key , $value)
    {
       $attributs = []; 
       $list = $this->db->prepare(
           "SELECT ".$key.' , '.$value." From ".$this->table,
       
           '',
            '\App\Entity\\'.ucfirst($this->table).'Entity'
       
       );

       foreach($list as $key => $value)
       {
           $attributes[$value->id] = $value->titre;
       }

       return $attributes;
    }


    public function save($data)
    {
        $sql = "UPDATE ".$this->table." SET ";
        $statement = '';
        $values = [];
        foreach($data as $key => $value)
        {
            $statement .= $key.' = ? ,';
            $values[] = $value;    
        } 
        $values[] = $data['id'];
        $statement = rtrim($statement , ',');
        $sql .= $statement;
        $sql .= 'WHERE id = ?';

       return  $this->db->prepare(
         $sql , $values , 
        '\App\Entity\\'.ucfirst($this->table).'Entity');
        
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (";
        $keys = implode(',', array_keys($data));
        $sql .= $keys.' ) VALUES(';
        $count = count($data);
        while($count != 0)
        {
            if($count == 1)
            {
                $sql .= '? ';
            }else{
                $sql .= '? ,';
            }
            $count--;
        }
        $sql .=")";
        return $this->db->prepare(
            $sql , 
            array_values($data),
            '\App\Entity\\'.ucfirst($this->table).'Entity' );
    }

    public function delete($id)
    {
       
        return $this->db->prepare(
            'DELETE FROM '.$this->table.' WHERE id = ?',
            [$id],
             '\App\Entity\\'.ucfirst($this->table).'Entity'
        );
    }
}