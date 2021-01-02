<?php

class CelebrityArticleModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_celebrity_article";
    }
}