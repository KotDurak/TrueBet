<?php

function debug($arg)
{
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    die();
}



ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
setlocale(LC_TIME, 'ru_RU.UTF-8');
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

$router = new Router();
$router->run();




