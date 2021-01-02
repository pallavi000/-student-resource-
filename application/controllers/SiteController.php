<?php

class SiteController extends MainController
{

    private $data = null;
    private $site_model = null;
    private $topics_model = null;
    private $article_model = null;

    public function __construct()
    {
        $this->topics_model = new TutorialModel();
        $this->article_model = new ArticleModel();
    }

    public function subscribe()
    {
        if (isset($_POST['email'])) {


            $this->site_model->attribute['email'] = $email = $_POST['email'];
            $this->site_model->tableName = "tble_subscriber";
            $insert = $this->site_model->insert();
            $this->redirect(CONTROLLER . "/index");

        } else {
            $this->redirect(CONTROLLER . "/index");
        }
    }

    public function privacy_policy()
    {

        $this->data['title'] = "Privacy Policy - " . Strings::$WEB_SITE_TITLE;
        $this->loadView(__FUNCTION__, $this->data);
    }

    public function terms_condition()
    {

        $this->data['title'] = "Terms & Condition - " . Strings::$WEB_SITE_TITLE;
        $this->loadView(__FUNCTION__, $this->data);
    }

    public function search()
    {


        $this->data['title'] = "Search - " . Strings::$WEB_SITE_TITLE;;
        if (isset($_POST['btn_search'])) {
            $search_key = $_POST['search_key'];
            $this->data['title'] = $_POST['search_key'];
            if (!empty($search_key)) {
                $like = "%$search_key%";
                $this->topics_model->condition = " status =:status && title LIKE :searchkey";
                $this->topics_model->params = array(":searchkey" => $like, ":status" => 1);
                $search_result = $this->topics_model->findAll();;
                if ($search_result) {
                    $this->data['advertise'] = $this->article_model->getAllAds();
                    $this->data['searched_record'] = $search_result;

                } else {
                    $this->data['advertise'] = $this->article_model->getAllAds();
                    $this->data['searched_record'] = false;
                }

            } else {
                $this->redirect("site/index");
            }


        } else {
            $this->redirect("site/index");
        }
        $this->loadView(__FUNCTION__, $this->data);
    }


    public function index($value = NULL)
    {

        $this->data['title'] = "Home Page - " . Strings::$WEB_SITE_TITLE;
        $a = $this->data['article_model'] = $article_model = new ArticleModel();
        $this->data['model_category'] = $model_category = new CategoryModel();
        $this->data['model_tutorial'] = $model_tutorial = new TutorialModel();


        $seo_titles = array();
        $seo_desc = array();
        foreach (Functions:: getMainCategory()as $row) {
            $seo_titles[] = $row->seo_title;
            $seo_desc[] = $row->seo_description;
        }
        $this->data['seo_title'] = implode(",", $seo_titles);
        $this->data['seo_description'] = implode(",", $seo_desc);
        $this->loadView(__FUNCTION__, $this->data);
    }


    public function aboutus($value = NULL)
    {


        $this->data['title'] = "About Us - " . Strings::$WEB_SITE_TITLE;
        $this->data['model_category'] = $model_category = new CategoryModel();
        $this->loadView(__FUNCTION__, $this->data);
    }


    public function contactus($value = NULL)
    {
        $this->data['title'] = "Contact Us - " . Strings::$WEB_SITE_TITLE;
        if (isset($_POST['btn_contact'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            $flag = true;
            if (empty($name)){
                $this->data['msg'] = "Name must be required!";
                $flag = false;
            }if (empty($email)){
                $this->data['msg'] = "Email must be required!";
                $flag = false;
            }

            $subject = "Contact by $email";
            if ($flag) {
                // Message
                // Compose a simple HTML email message
                ob_start();
                $this->loadPartialView("_contact_mail_format", array("name"=>$name, "email" => $email,"subject"=>$subject,"message"=>$message));
                $message = ob_get_contents();
                ob_clean();
                $result = Utilities::getMail($email, $subject, $message);
                if($result){
                    $this->data['msg'] = "Open your mail box to change password.";
                    $this->redirect("site/contactus");
                }


            }



        }

        $this->loadView(__FUNCTION__, $this->data);
    }


}

