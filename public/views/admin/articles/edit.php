<?php
    $article = \App\App::getInstance()->getTable('articles')->find($_GET['id']);

    if(isset($_POST) && isset($_POST['titre']))
    {
        //save cette article
      $result =  \App\App::getInstance()->getTable('articles')->save($_POST);
   

      if($result)
      {
          $message = "Cette article a bien ete modifie";
      }else{
          $message = 'Error';
      }
      $_SESSION['info'] = [
          'result'=> $result,
          'message' => $message
      ]; 
      header('location: index.php?p=admin.index');
    }

    $form = new \Core\Html\Form($article);
   
    $categories = \App\App::getInstance()->getTable('categories')->pluck('id','titre');

?>


<div class="container">

 <div class="row">
    <h3>Modifier l'article </h3>

    <form method="POST" action="" >
        <div class="form-group">
            <?=$form->input('titre', 'text', ['class'=>'form-control']); ?>
            <?=$form->hidden('id', $article->id);?>
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