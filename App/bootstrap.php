<?php

use App\Db\MySql;

define('APP_DIR' , __DIR__ . "/../" );

require_once APP_DIR . '/vendor/autoload.php';
$config = require_once APP_DIR . '/config/config.php';


//$connect = new MySql($config['db']['host'] , $config['db']['user'] ,$config['db']['password'] ,$config['db']['db_name']);

function DataBase(){
    global $config;
    $mysql = new MySql($config['db']['host'] , $config['db']['user'] ,$config['db']['password'] ,$config['db']['db_name']);
    return $mysql;
}
function smarty(){
    global $config;
    static $smarty;

    if (is_null($smarty)) {
        $smarty = new Smarty();

        $smarty->template_dir = $config['template']['template_dir'];
        $smarty->compile_dir = $config['template']['compile_dir'];
        $smarty->cache_dir = $config['template']['cache_dir'];
    }

    return $smarty;
}


