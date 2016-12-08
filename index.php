<?php

require 'app/Autoloader.php';
use App\Autoloader;
use App\DataBase;
use App\Config;
//自动加载类
Autoloader::register();


if(isset($_GET['p']))
{
    $page = $_GET['p'];

}else{
    $page = 'home';
}

$app = App\App::getInstance();

var_dump($app->db());







