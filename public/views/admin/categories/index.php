<?php
    $categories = \App\App::getInstance()->getTable('categories')->all();
    
?>
<h3>Commande des articles</h3>


<div class="container">
   <?php
    if(isset($_SESSION['info']))
    {
         echo \App\App::getInstance()->getMessage($_SESSION['info']['result'], $_SESSION['info']['message']);
    }
    unset($_SESSION['info']);
   ?> 

   <div class="pull-right">
        
        <a href="<?=\App\Entity\CategoriesEntity::getCreate(); ?>" class="btn btn-default">Ajouter une categorie</a>
        
   </div>
   <table class="table">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Operation</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($categories as $categorie)
                {
            ?>
            <tr>
                <td><?=$categorie->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="<?=$categorie->editUrl; ?>">Edite</a>
                    <form action="<?=$categorie->delete; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?=$categorie->id?>">
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