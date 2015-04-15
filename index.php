<?php

define('PROJECT_DIR', realpath(dirname(__FILE__)));

require_once './lib/Router.php';
require_once './lib/Response.php';
require_once './lib/View.php';

function __autoload($classname) {
  $classname = ltrim($classname, '\\');
  $classname = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
  require_once "./app/$classname.php";
}

$router =  new Router;
$response = $router->respond();
$response
  ->send_status()
  ->send_headers()
  ->send_content();
