<?php

    $article = \App\App::getInstance()->getTable('articles')->find($_GET['id']);



?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h2><?= $article->titre; ?> </h2>
        <p>Cette article est a <strong><?=$article->category; ?></strong></p>
        <p class="pull-right">Publie a <?=$article->date; ?></p>
    </div>
    <div class="panel-body">
   <p><?=$article->contenu;?></p>
    </div>
 
</div>