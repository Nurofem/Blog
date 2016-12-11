<?php

define('ROOT', str_replace('\\', '/', __DIR__));


require ROOT.'/app/App.php';
use App\App;

App::load();



if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

ob_start();

if ($page === 'home') {
  
    require ROOT.'/public/views/articles/home.html';

} elseif ($page === 'article.categorie') {
    
    require ROOT.'/public/views/articles/categorie.html';

} else {

    require ROOT.'/public/views/articles/single.html';
}

$content = ob_get_clean();

require ROOT.'/public/views/template/layout.php';
