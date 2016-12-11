<?php

namespace App\Table;

use App\App;
use Core\Table\Table;

class CategoriesTable extends Table{


    protected $table = 'categories';


    public function find($id)
    {
         return $this->db->prepare(

           " SELECT articles.id , articles.titre , articles.contenu ,
             articles.date_de_creation , articles.category_id , categories.titre AS category
             FROM Articles 
             LEFT JOIN categories 
             ON articles.category_id = categories.id
             WHERE categories.id = ?
             ORDER BY articles.date_de_creation ,  'DESC'               
            ",
            [$id],

            '\App\Entity\\'.ucfirst($this->table).'Entity'
           
        );
    }


}
