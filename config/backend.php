<?php
define("VIEWS_PATH", "admin/views/");
define("PUBLIC_PATH", MAIN_URL."public/admin/"); 
define("LIBRARY_PATH", MAIN_URL."library/"); 
define("SESSION_KEY", "adminLoginSessionKey");
define("COOKIE_KEY", "adminLoginCookieKey");

//ABOUT CKEDITOR
define("CKEDITOR_VERSION", "4.11.1");
define("CDEDITOR_DISTRIBUTION", "standard");

function load() {
    $url = isset($_GET['url']) ? $_GET['url'] : 'site/index';
    $urls = explode("/", $url);
    

    $controller = "site";
    $method = "index";
    $parameter = NULL;


    if (isset($urls[0]) && !empty($urls[0])) {
        $controller = $urls[0];
    }
    if (isset($urls[1]) && !empty($urls[1])) {
        $method = $urls[1];
    }
    if (isset($urls[2]) && !empty($urls[2])) {
        $parameter = $urls[2];
    }

    $controllerName = ucfirst($controller) . "Controller";
    define("CONTROLLER", $controller);
    define("METHOD", $method);
    $object = new $controllerName();
    $object->$method($parameter);
    
    
    
}

function __autoload($className) {
    if (file_exists(ROOT . DS . "admin" . DS . "controllers" . DS . "$className.php")) {
        include_once ROOT . DS . "admin" . DS . "controllers" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "admin" . DS . "components" . DS . "$className.php")) {
        include_once ROOT . DS . "admin" . DS . "components" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "admin" . DS . "models" . DS . "$className.php")) {
        include_once ROOT . DS . "admin" . DS . "models" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "framework" . DS . "$className.php")) {
        include_once ROOT . DS . "framework" . DS . "$className.php";
    }

}

load();
