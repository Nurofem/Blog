<?php
 
    if(isset($_POST['username']) && isset($_POST['password']))
    {
       $result = $auth->login($_POST['username'], $_POST['password']);
       \App\App::getInstance()->getMessage($result , 'Success');
       
    }

    $article = new \App\Entity\ArticlesEntity();
    
    $form = new \Core\Html\Form($article);
  
    
 

?>
<div class="container">
<h3>Login</h3>

    <div class="container">
    
        <form action="" method="post">
            <div class="form-group">
            <?php echo $form->input('username', 'text' , ['class'=> 'form-control']);
             
            ?>
            </div>
            
            <div class="form-group">
            
                <?php echo $form->input('password', 'password', ['class'=>'form-control']) ?>
            </div>

            <div class="form-group">
            
                <?php echo $form->button('login'); ?>
            </div>    

        </form>
    </div>



</div>
