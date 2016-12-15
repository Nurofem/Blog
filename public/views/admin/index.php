<?php


$auth = new \Core\Auth\DBAuth(\App\App::getInstance()->db());

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'admin.index';
}


if(!$auth->logged())
{
  
  require ROOT.'/public/views/user/login.php';

}else{


var_dump($page);

ob_start();

if ($page === 'admin.index') {
  
    require ROOT.'/public/views/admin/articles/articles.php';

}elseif($page === 'admin.article.edit')
{

    require ROOT.'/public/views/admin/articles/edit.php';

}elseif($page === 'admin.article.create')
{

    require ROOT.'/public/views/admin/articles/create.php';
    
} elseif($page == 'admin.article.delete'){


    require ROOT.'/public/views/admin/articles/delete.php';

}elseif($page == 'admin.category.index')
{

    require ROOT.'/public/views/admin/categories/index.php';

}elseif($page == 'admin.category.create'){

    require ROOT.'/public/views/admin/categories/create.php';

}elseif($page == 'admin.category.edit'){

    require ROOT.'/public/views/admin/categories/edit.php';
}elseif($page == 'admin.category.delete'){

    require ROOT.'/public/views/admin/categories/delete.php';
}

$content = ob_get_clean();

require ROOT.'/public/views/template/layout.php';



}




