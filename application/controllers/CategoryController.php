<?php

class CategoryController extends MainController
{
    
    private $data = null;

    private $topics_model = null;
    private $article_model = null;

    public function __construct()
    {
        $this->topics_model = new TutorialModel();
        $this->article_model = new ArticleModel();
    }



    public function index($value = NULL)
    {

        $this->data['title'] = "Category - ".Strings::$WEB_SITE_MORAL;

        $seo_titles = array();
        $seo_desc = array();
        foreach(Functions::getMainTutorial() as $row){
            $seo_titles[] = $row->seo_title;
             $seo_desc[]= $row->seo_description;
        }
        $this->data['seo_title'] = implode(",",$seo_titles);
        $this->data['seo_description']= implode(",",$seo_desc);

        $this->loadView(__FUNCTION__, $this->data);
    }


public function details($value = NULL)
    {
        $this->data['title'] = "Category Details";
        $this->loadView(__FUNCTION__, $this->data);
    }


}

