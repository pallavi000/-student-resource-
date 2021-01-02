<?php

class NewsArticleModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_blog_news";
    }


}