<?php
$form = new \Core\Html\Form([]);
$categories = \App\App::getInstance()->getTable('categories')->pluck('id', 'titre');

if(isset($_POST) && isset($_POST['titre']))
{
   $result = \App\App::getInstance()->getTable('articles')->create($_POST);

   
      if($result)
      {
          $message = "Cette article a bien ete cree";
      }else{
          $message = 'Error';
      }
      $_SESSION['info'] = [
          'result'=> $result,
          'message' => $message
      ]; 
      header('location: index.php?p=admin.index');
}


?>


<div class="container">

 <div class="row">
    <h3>Modifier l'article </h3>

    <form method="POST" action="" >
        <div class="form-group">
            <?=$form->input('titre', 'text', ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?=$form->input('slug', 'text', ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?=$form->textarea('contenu', 'form-control'); ?>
        </div>
      
        <div class="form-group">
            <label for="category_id">
            Category:
             <?=$form->select('category_id',$categories, 'form-control'); ?>
             
            </label>
           
        </div>

         <div class="form-group">
            <?=$form->button('Modifier'); ?>

        </div>
      
     
    </form>
   </div>
</div>