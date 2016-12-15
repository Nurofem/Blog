<?php
    $articles = \App\App::getInstance()->getTable('articles')->all();
    
?>
<h3>Commande des articles</h3>


<div class="container">
   <?php
    if(isset($_SESSION['info']))
    {
         echo \App\App::getInstance()->getMessage($_SESSION['info']['result'], $_SESSION['info']['message']);
    }
   
   ?> 

   <div class="pull-right">
        
        <a href="<?=\App\Entity\ArticlesEntity::getCreate(); ?>" class="btn btn-default">Ajouter une article</a>
        
   </div>
   <table class="table">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Created_at</th>
                <th>Operation</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($articles as $article)
                {
            ?>
            <tr>
                <td><?=$article->titre; ?></td>
                <td><?=$article->date; ?></td>
                <td>
                    <a class="btn btn-primary" href="<?=$article->editUrl; ?>">Edite</a>
                    <form action="<?=$article->delete; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?=$article->id?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>

   </table>

</div>