<?php

require '../app/Autoloader.php';

use Demo\CarFactory;
use App\Autoloader;
use App\App;

Autoloader::register();

$app = App::getInstance();

var_dump($app->getTable('articles'));
var_dump($app->getTable('categories'));





