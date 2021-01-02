<?php

class BlogCategoryModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_blog_category";
    }



    public function getFieldLabel()
    {
        return array(

            "post_date" => "Post Date",
            "self_category_id" => "Category",
            "title" => "Title",
            "url" => "Url",
            "status" => "Status"

        );
    }

    public function getMainCategories()
    {
        $this->condition = "status = :status ORDER BY title DESC";
        $this->params = array(":status"=>'1');
        return $this->findAll();
    }


    public function getAllFields()
    {
        return array(

            "self_category_id" => "Category",
            "title" => "Title",
            "url" => "Url",
            "post_date" => "Post Date",
            "status" => "Status"

        );
    }


}