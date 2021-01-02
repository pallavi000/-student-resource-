<?php

class CelebrityArticleModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_celebrity_article";
    }



    public function getFieldLabel()
    {
        return array(

            "post_date" => "Post Date",
            "category_id" => "Category",
            "title" => "Title",
            "url" => "Url",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Post Date",
            "category_id" => "Category",
            "title" => "Title",
            "url" => "Url",
            "status" => "Status"

        );
    }


}