<?php

class SiteController extends MainController
{

    public function __construct()
    {
        $this->imgPath = "uploaded/".CONTROLLER."/";
    }

    public function sitemap()
    {
        $data = array();
        $data['title']="Site Map";


        $this->loadView("sitemap",$data);
    }


    public function  login()
    {

        $data = array();
        $data['title'] = "SITE - Login Page.";
        $data['model'] = $model = new AdminModel();
        $data['error'] = "";

        if (isset($_POST['login'])) {

            $model->username = $username = (trim($_POST['user_name']));
            $model->password = $password = (trim($_POST['password']));
            if (!empty($username) && !empty($password)) {

                $access = $model->loginCheck();
        
                if ($access) {
                    $this->setSession(SESSION_KEY, $model->loginCheck());
                    $this->redirect("site/index");
                } else {

                    $data['error'] = "Invalid username or password";
                }
            } else {
                $data['error'] = "Fields can't left blank!";
            }

        }

        $this->loadPartialView("login", $data);
    }
    public function index($value = NULL)
    {

        $data = array();
        $this->isLogedIn();
        $data['title'] = "Dashboard - Welcome page!";
        $data['session_value'] = $this->getSession(SESSION_KEY);
        $data['model'] = $model = new AdminModel();
        $this->loadView("index", $data);
    }







    public function logout()
    {
        $this->unsetSession(SESSION_KEY);
        $this->unsetCookie(COOKIE_KEY);
        $this->redirect("site/login");
    }

}

