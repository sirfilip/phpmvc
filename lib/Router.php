<?php

class Router {

  public function __construct() {}

  public function respond() 
  {
    $path_info = '';
    if (array_key_exists('PATH_INFO', $_SERVER)) $path_info = $_SERVER["PATH_INFO"];
    $path_info = ltrim($path_info, '/');

    $chunks = explode('/', $path_info);
    $controller = array_shift($chunks);
    
    if ($controller) {
      $controller = ucfirst($controller);
      $controller = "Controller\\$controller";
    } else {
      $controller = 'Controller\Index';
    }

    $action = array_shift($chunks);
    if ($action) {
      $method = $action;
    } else {
      $method = 'index';
    }

    if (! class_exists($controller)) return Response::not_found("Controller $controller not found.");

    $controller_instance = new $controller;

    if (! method_exists($controller_instance, "action_$method")) return Response::not_found("Action $method for controller $controller does not exists.");

    return call_user_func_array(array($controller_instance, "action_$method"), $chunks);

  }

}
