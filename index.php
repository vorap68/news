<?php
use app\core\Db;
use \app\core\Router;
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'app/core/function.php';
require_once 'vendor/autoload.php';
spl_autoload_register(function($class){
    $path =  str_replace('\\', '/', $class.'.php');
    if(file_exists($path)){
	require $path;
    }
  });
  
  
  $router = new Router();
  $router->run();

