<?php

class TutorialController extends MainController
{
    private $data = null;
    public function __construct()
    {
        $this->data['model'] = $model = new TutorialModel();
    }



    public function index($value = NULL)
    {

        $this->data['title'] = "Tutorial Page - ".Strings::$WEB_SITE_MORAL;

        $this->data['single_category_item'] = $this->data['model']->getSingleCategoryByUrl($value);
        $this->data['tutorials_by_category_url']= $tutorials= $this->data['model']->getTutorialByCategoryUrl($value);
        $tutorials_result = array();
        foreach ($tutorials as $row){
            $tutorials_result[] = $row->title;
        }
        $tutorial = implode(", ",$tutorials_result);
        $this->data['title'] = $this->data['single_category_item']->title;
        $this->data['seo_title'] = $tutorial;
        $this->data['seo_description'] = $tutorial;
        $this->loadView(__FUNCTION__, $this->data);
    }

}

