<?php

namespace App\Entity;

class ArticlesEntity extends Entity{


    public function getUrl()
    {
        return 'index.php?p=article&id='.$this->id;
    }

    public function getExtrait()
    {
        return substr($this->contenu , 0 , 100).'...';
    }

    public function getDate()
    {
        return date('d-m-Y', strtotime($this->date_de_creation));
    }


}