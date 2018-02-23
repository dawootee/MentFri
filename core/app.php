<?php

require_once(ROOT_PATH . "core/controller.php");
require_once(ROOT_PATH . "core/model.php");


$url = isset($_GET['url']) ? $_GET['url'] : '';

$controller = "main";
$action = "__construct";



if (strlen($url) > 0) {
    $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
    if (isset($url[0])) {
      if($url[0] == "admin") {
        $controller = $url[0];
        if(isset($url[1])) {
          $action = $url[1];
        }
      } else {
        $action = $url[0];
      }
    }
}



if (file_exists(ROOT_PATH . "controllers/" . strtolower($controller) . '.php')) {
    require_once(ROOT_PATH . "controllers/" . strtolower($controller) . '.php');
    if (class_exists($controller)) {
      if(method_exists($controller, $action)) {
        $controller = new $controller($action);
      } else {
        echo "Method Not found";
      }
    } else {
        echo "No class found.";
    }
} else {
    echo "File not found.";
}
