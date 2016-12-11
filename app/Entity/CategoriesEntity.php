<?php

namespace App\Entity;

class CategoriesEntity extends Entity{

    public function getUrl()
    {
        return 'index.php?p=article.categorie&id='.$this->id;
    }
    
}