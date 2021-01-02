<?php

class BlogNewsModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_blog_news";
    }



    public function getFieldLabel()
    {
        return array(

            "post_date" => "News Post Date",
            "category_id" => "News Category",
            "title" => "Title",
            "url" => "News Url",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "News Post Date",
            "category_id" => "News Category",
            "title" => "Title",
            "url" => "News Url",
            "status" => "Status"

        );
    }


}