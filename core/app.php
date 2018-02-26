<?php

require_once(ROOT_PATH . "core/controller.php");
require_once(ROOT_PATH . "core/model.php");


$url = isset($_GET['url']) ? $_GET['url'] : '';

$controller = "main";
$action = "__construct";
$parameters = null;

if (strlen($url) > 0) {
    $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
    if (isset($url[0])) {
      if(in_array($url[0], ["admin", "ajax"])) {
        $controller = $url[0];

        unset($url[0]);


        if(isset($url[1])) {
          $action = $url[1];


          unset($url[1]);

          $url = array_values($url);

          $parameters = $url;


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
        $controller = new $controller($action, $parameters);
      } else {
        echo "Method Not found";
      }
    } else {
        echo "No class found.";
    }
} else {
    echo "File not found.";
}
