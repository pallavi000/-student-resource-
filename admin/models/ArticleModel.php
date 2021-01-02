<?php

class ArticleModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_article";
    }


    public function loadDirectoryImage($dir = null){


// Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                $data = array();
                while (($file = readdir($dh)) !== false){
                    $data[] = $file;
                }
                return $data;
                closedir($dh);
            }
        }
    }



    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",
            "title" => "Article Title",
            "url" => "Url",
            "hits" => "Hits",
            "approved" => "Approve",

            "status" => "Status"


        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Article Title",
            "url" => "Url",
            "summary" => "Summary",
            "details" => "Details",
            "seo_title" => "SEO Title",
            "seo_description" => "SEO Description",
            "hits" => "Hits",
            "image" => "Image",
            "approved" => "Approve",

            "status" => "Status"

        );
    }


}