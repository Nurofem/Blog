<?php

namespace App\Table;

use Core\Table\Table;
use App\App;



class ArticlesTable extends Table{

    protected $table = 'articles';


    public  function all()
    {
         return $this->db->prepare(

           " SELECT articles.id , articles.titre , articles.contenu ,
             articles.date_de_creation , articles.category_id , categories.titre AS category
             FROM Articles 
             LEFT JOIN categories 
             ON articles.category_id = categories.id
             ORDER BY articles.date_de_creation DESC               
            ",
            null,

            '\App\Entity\\'.ucfirst($this->table).'Entity'
        );
    }

    public function find($id)
    {
        return $this->db->prepare(

           " SELECT articles.id , articles.titre , articles.contenu ,
             articles.date_de_creation , articles.category_id , categories.titre AS category
             FROM Articles 
             LEFT JOIN categories 
             ON articles.category_id = categories.id
             WHERE articles.id = ?
             ORDER BY articles.date_de_creation  DESC               
            ",
            [$id],

            '\App\Entity\\'.ucfirst($this->table).'Entity',
            true
           
        );
    }

    public function findByCategory($id)
    {
        return $this->db->prepare(

           " SELECT articles.id , articles.titre , articles.contenu ,
             articles.date_de_creation , articles.category_id , categories.titre AS category
             FROM Articles 
             LEFT JOIN categories 
             ON articles.category_id = categories.id
             WHERE articles.category_id = ?
             ORDER BY articles.date_de_creation ,  'DESC'               
            ",
            [$id],

            '\App\Entity\\'.ucfirst($this->table).'Entity'
           
        );
    }

  


}
