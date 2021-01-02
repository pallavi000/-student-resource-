<?php

class CategoryModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_category";
    }

    public function getMainCategory() {

        $this->condition = "category_self_id = :id";
        $this->params = array(":id"=>'0');
        return $this->findAll();

    }



    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Category Title",
            "category_self_id" => "Category Type",
            "url" => "Url",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Category Title",
            "category_self_id" => "Category Type",
            "url" => "Url",
            "seo_title" => "SEO Title",
            "seo_description" => "SEO Description",
            "hits" => "Hits",
            "image" => "Image",

            "status" => "Status"

        );
    }


}