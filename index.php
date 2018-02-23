<?php

define('PROTOCOL', (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://', true);
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('ROOT_URL', preg_replace("/\/$/", "", PROTOCOL.DOMAIN.str_replace(array('\\', "index.php", "index.html"), "", dirname(htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES))), 1) . "/", true);
define('ROOT_PATH', __DIR__ . "/", true);
define('TEMPLATE_URL', ROOT_URL . "template/", true);
define('TEMPLATE_PATH', ROOT_PATH . "template/", true);

require_once(ROOT_PATH . "core/app.php");
