<?php

namespace App\Table;

use App\App;
use Core\Table\Table;

class CategoriesTable extends Table{


    protected $table = 'categories';


    public function find($id)
    {
         return $this->db->prepare(

           " SELECT * FROM categories WHERE id = ? " ,
            [$id],
            '\App\Entity\\'.ucfirst($this->table).'Entity',
            true
           
        );
    }




}
