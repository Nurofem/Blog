<?php
    $categorie = \App\App::getInstance()->getTable('categories')->find($_GET['id']);
    
    if($categorie == null)
    {
        $message = '404 Page untrouvable';
         $_SESSION['info'] = [
          'result'=> false,
          'message' => $message
      ]; 
      header('location: index.php?p=admin.category.index');
    }



    if(isset($_POST) && isset($_POST['titre']))
    {
        //save cette article
      $result =  \App\App::getInstance()->getTable('categories')->save($_POST);
   

      if($result)
      {
          $message = "Cette categorie a bien ete modifie";
      }else{
          $message = 'Error';
      }
      $_SESSION['info'] = [
          'result'=> $result,
          'message' => $message
      ]; 
      header('location: index.php?p=admin.category.index');
    }

    $form = new \Core\Html\Form($categorie);
  

?>


<div class="container">

 <div class="row">
    <h3>Modifier l'article </h3>

    <form method="POST" action="" >
        <div class="form-group">
            <?=$form->input('titre', 'text', ['class'=>'form-control']); ?>
            <?=$form->hidden('id', $categorie->id);?>
        </div>

         <div class="form-group">
            <?=$form->button('Modifier'); ?>

        </div>
      
     
    </form>
   </div>
</div>