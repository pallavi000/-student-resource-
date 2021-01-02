<?php

class MainController
{

    protected $header = "includes/header";
    protected $footer = "includes/footer";

    /*To Load page with Header, Body and Footer*/
    protected function loadView($file = NULL, $data = array())
    {
        //converting arraykey to variable

        foreach ($data as $key => $value) {
            $$key = $value;  //data['title'] = "good";
        }

        include VIEWS_PATH . $this->header . ".php";
        include VIEWS_PATH . CONTROLLER . "/" . $file . ".php";
        include VIEWS_PATH . $this->footer . ".php";
    }

    /*To Load page with only partial part*/
    protected function loadPartialView($file = NULL, $data = array())
    {
     
        foreach ($data as $key => $value) {
            $$key = $value;  
        }
        include VIEWS_PATH . CONTROLLER . "/" . $file . ".php";
    }

    /*To check,set,get and unset session*/
    protected function isSession($key = NULL)
    {
        if (!$key) {
            return false;
        }

        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }

    protected function setSession($key = NULL, $value = NULL)
    {
        if (!$key && !value) {
            return false;
        }

        $_SESSION[$key] = $value;


    }

    protected function getSession($key = NULL)
    {
        if (!$key) {
            return false;
        }

        if ($this->isSession($key)) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    protected function unsetSession($key = NULL)
    {
        if ($key) {
            unset($_SESSION[$key]);
        } else {
            session_destroy();
        }
    }

    /*To check,set,get and unset cookie*/
    protected function isCookie($key = NULL)
    {
        if (!$key) {
            return false;
        }

        if (isset($_COOKIE[$key])) {
            return true;
        } else {
            return false;
        }
    }

    protected function setCookie($key = NULL, $value = NULL)
    {

        if (!$key && !value) {
            return false;
        }

        $time = time() + 60 * 60; //for one hour

        /*serialize is use to store multiple data in cookie with array or object or anyformat*/
        setcookie($key, serialize($value), $time);
    }

    protected function  getCookie($key = NULL)
    {
        if (!$key) {
            return false;
        }

        if ($this->isCookie($key)) {
            return unserialize($_COOKIE[$key]);
        } else {
            return false;
        }
    }

    protected function unsetCookie($key = NULL)
    {
        if (!$key) {
            return false;
        }
        $time = time() - 1;
        setcookie($key, NULL, $time);
    }

    protected function redirect($url = NULL)
    {
        if (!$url) {
            header("Location:" . MAIN_URL);
        } else {
            header("Location:" . LINK_URL . $url);
        }
        exit;
    }

    protected function isLogedIn($url = "site/login")
    {
        if (!$this->isSession(SESSION_KEY)) {
            $this->redirect($url);
        }
    }

    protected function isRole($controller = null)
    {
        $rol = Functions::getRole($this->getSession(SESSION_KEY)->id);
        $role_arr = explode(", ",$rol->role);
        if (!in_array($controller,$role_arr)) {
            $this->redirect("site/index");
        }
    }

    protected function setFlashedMessage($key = "error", $message = NULL)
    {
        if ($message) {
            $_SESSION['message'][$key] = $message;
        }
    }

    protected function getFlashedMessage()
    {
        if ($this->isSession('message')) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            return $message;
        } else {
            return array();
        }
    }

    protected function getModel($modelName = NULL)
    {
        $model = new $modelName();
        //when search

        if (isset($_POST['search'])) {

            $searchby = $_POST['search_by'];
            $searchkey = $_POST['search_key'];



            $this->setSession('searchby', $searchby);
            $this->setSession('searchkey', $searchkey);

            $like = "%$searchkey%";
            $model->condition = " $searchby LIKE :searchkey";
            $model->params = array(":searchkey" => $like);


        } elseif (isset($_GET['page']) && isset($_SESSION['searchby'])) {
            $searchby = $this->getSession('searchby');
            $searchkey = $this->getSession('searchkey');

            $like = "%$searchkey%";
            $model->condition = " $searchby LIKE :searchkey";
            $model->params = array(":searchkey" => $like);
        } else {
            $this->unsetSession('searchby');
            $this->unsetSession('searchkey');
            $model->condition = "1 ORDER BY post_date DESC";
        }

        return $model;
    }

}
