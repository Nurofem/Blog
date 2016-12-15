<?php
    if(isset($_POST) && isset($_POST['id']))
    {
        $result = \App\App::getInstance()->getTable('categories')->delete($_POST['id']);
            
        if($result)
        {
            $message = "Cette categorie a bien ete supprimer";
        }else{
            $message = 'Error';
        }
        $_SESSION['info'] = [
            'result'=> $result,
            'message' => $message
        ]; 
        header('location: index.php?p=admin.category.index');
    }