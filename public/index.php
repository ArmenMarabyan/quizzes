<?php
session_start();
use fw\core\Router;
// session_destroy();
//
$uri = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/fw/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'default');
define('DEBUG', 1);
define('COMPRESS_HTML', 0);


require_once '../vendor/fw/libs/functions.php';
require_once __DIR__ . "/../vendor/autoload.php";

//Свой автозагрузчик классов
//spl_autoload_register(function($class) {
//    $file = ROOT . '/'. str_replace('\\', '/', $class) . '.php';
//
//    if(file_exists($file)) {
//        require_once $file;
//    }
//});

new fw\core\App;
// debug($_SESSION);
//пользовательские маршруты
Router::add('^tests/(?P<action>[a-z-]+)/(?P<alias>[a-z0-9-]+)$', ['controller' => 'Tests']);
Router::add('^tests/(?P<alias>[a-z-]+)$', ['controller' => 'Tests', 'action' => 'view']);


//Дэфолтные маршруты админки
Router::add('^admin/tests/(?P<action>[a-z-]+)/(?P<alias>[0-9-]+)$', ['controller' => 'Tests', 'prefix' => 'admin']);
Router::add('^admin$', ['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

//Дэфолтные маршруты
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// debug(Router::getRoute());

Router::dispatch($uri);
