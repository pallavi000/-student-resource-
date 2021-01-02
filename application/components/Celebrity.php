<?php

class Celebrity
{

    public static function getCelebrityCategory($limit=50)
    {

        $category_model = new CelebrityCategoryModel();
        $category_model->limit = $limit;
        $category_model->condition="status=:status order by post_date desc";
        $category_model->params = array(':status'=>1);
        return $category_model->findAll();
    }

    public static function getPaginationData($limit = 50)
    {

        $category_model = new CelebrityArticleModel();
        $category_model->limit = $limit;
        $category_model->condition="status=:status order by post_date desc";
        $category_model->params = array(':status'=>1);
        return $category_model->getRecords();
    }

    public static function getPopularCelebrity($limit = 50)
    {

        $category_model = new CelebrityArticleModel();
        $category_model->limit = $limit;
        $category_model->condition="status=:status order by hits desc";
        $category_model->params = array(':status'=>1);
        return $category_model->findAll();
    }

    public static function getCategoryDataById($id)
    {

        $category_model = new CelebrityCategoryModel();
        $category_model->condition="status=:status && id=:id";
        $category_model->params = array(':status'=>1,":id"=>$id);
        $find = $category_model->find();
        return array("title"=>$find->title,"url"=>$find->url);
    }

}