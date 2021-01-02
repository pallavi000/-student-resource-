<?php
define("VIEWS_PATH", "application/views/");
define("PUBLIC_PATH", MAIN_URL . "public/");
define("LIBRARY_PATH", MAIN_URL . "library/");
define("SESSION_KEY", "LoginSessionKey");
define("COOKIE_KEY", "LoginCookieKey");
define("TUTORIAL_ID", "tutorial_key");
define("DEFAULT_IMG", "default.jpg");
define("ABOUT_COMPANY", "Saral Gyan is one of the best idea and a website which contains Educational Materials like tutorials
            , article and other skills. People can learn basic level of programming language like
            PHP, HTML, CSS to the most advanced level from...");


function load()
{
    $url = isset($_GET['url']) ? $_GET['url'] : 'site/index';
    //$url = isset($_GET['url']) ? $_GET['url'] : 'site/index';
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
    define("PARAMETER", $parameter);

    if (file_exists(ROOT . DS . "application" . DS . "controllers" . DS . "$controllerName.php")) {

    } else {
        header("Location:" . LINK_URL . "error/page_not_found");
    }

    $object = new $controllerName();
    if (method_exists(get_class($object), $method)) {
        $object->$method($parameter);
    } else {
        header("Location:" . LINK_URL . "error/page_not_found");
    }


    //$object = new $controllerName();
    //$object->$method($parameter);


}

function __autoload($className)
{


    if (file_exists(ROOT . DS . "application" . DS . "controllers" . DS . "$className.php")) {
        include_once ROOT . DS . "application" . DS . "controllers" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "application" . DS . "components" . DS . "$className.php")) {
        include_once ROOT . DS . "application" . DS . "components" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "application" . DS . "models" . DS . "$className.php")) {
        include_once ROOT . DS . "application" . DS . "models" . DS . "$className.php";
    }
    if (file_exists(ROOT . DS . "framework" . DS . "$className.php")) {
        include_once ROOT . DS . "framework" . DS . "$className.php";
    }



}

try {
    load();


} catch (Exception $e) {
    echo 'Caught exception: ', "\n";
}
