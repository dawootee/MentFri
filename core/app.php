<?php

define('PROTOCOL', (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://', true);
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('ROOT_URL', preg_replace("/\/$/", '', PROTOCOL.DOMAIN.str_replace(array('\\', "index.php", "index.html"), "", dirname(htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES))), 1) . '/', true);


require_once(dirname(__FILE__) . '/controller.php');
require_once(dirname(__FILE__) . '/model.php');


$url = isset($_GET['url']) ? $_GET['url'] : '';

$controller = "main";
$action = "__construct";



if (strlen($url) > 0) {


    $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));



    if (isset($url[0])) {

      if($url[0] == "dashboard") {
        //first index is controller and all other are actions
        $controller = $url[0];

        if(isset($url[1])) {
          $action = $url[1];
        }


      } else {
        //all array indices are actions
        $action = $url[0];
      }





    }



}



if (file_exists(realpath(__DIR__ . '/../controllers/' . $controller . '.php'))) {
    require_once(realpath(__DIR__ . '/../controllers/' . $controller . '.php'));

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
