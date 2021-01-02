<?php

class TutorialModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_tutorial";
    }

    public function getCategory() {
        $category_model = new CategoryModel();
        return $category_model->findAll();

    }


    public function getMainTutorial() {

        $this->condition = "tutorial_self_id = :id";
        $this->params = array(":id"=>'0');
        return $this->findAll();

    }

    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Tutorial Title",
            "category_id" => "Category Type",
            "tutorial_self_id" => "Tutorial Type",
            "url" => "Url",
            "hits" => "Hits",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Tutorial Title",
            "category_id" => "Category Type",
            "tutorial_self_id" => "Tutorial Type",
            "url" => "Url",
            "seo_title" => "SEO Title",
            "seo_description" => "SEO Description",
            "hits" => "Hits",
            "image" => "Image",

            "status" => "Status"

        );
    }


}