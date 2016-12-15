<?php

namespace App\Entity;

class CategoriesEntity extends Entity{

    public function getUrl()
    {
        return 'index.php?p=article.categorie&id='.$this->id;
    }

    public static function getCreate()
    {
        return 'index.php?p=admin.category.create';
    }

    public function getDelete()
    {
        return 'index.php?p=admin.category.delete';
    }
     public function getEditUrl()
    {
        return 'index.php?p=admin.category.edit&id='.$this->id;
    }

    
}