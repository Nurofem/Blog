<?php
    if(isset($_POST) && isset($_POST['id']))
    {
        $result = \App\App::getInstance()->getTable('articles')->delete($_POST['id']);
            
        if($result)
        {
            $message = "Cette article a bien ete supprimer";
        }else{
            $message = 'Error';
        }
        $_SESSION['info'] = [
            'result'=> $result,
            'message' => $message
        ]; 
        header('location: index.php?p=admin.index');
    }