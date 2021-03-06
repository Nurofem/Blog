<?php

namespace App;

use Core\Database;
use Core\Config;
use Core\Autoloader;

class App
{
    protected static $_instance;
    protected static $db;
    


    protected $path_table = '\\App\Table\\';
    public $titre = 'Mon blog';

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        if (self::$db == null) {
            self::$db = new DataBase(
              Config::getInstance()->get('db_host'),
              Config::getInstance()->get('db_name'),
              Config::getInstance()->get('db_user'),
              Config::getInstance()->get('db_pass'));
        }
    }

    public function db()
    {
        return self::$db;
    }


    public function getTable($table)
    {
        $table = ucfirst($table);
        $method = $this->path_table.$table.'Table';

        return new $method(self::$db);
    }

    public static function load()
    {
        session_start();
        require ROOT.'/core/Autoloader.php';

        Autoloader::register();
    }

    public function getMessage($result , $msg)
    {
        $class = $result == true ? 'success' : 'danger';
        $html = "<div class='alert alert-{$class}' id=info>".$msg."</div>";

        return $html;
    }


}
