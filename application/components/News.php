<?php

class News
{
    public static function getPaginationData($limit = 50)
    {

        $category_model = new NewsArticleModel();
        $category_model->limit = $limit;
        $category_model->condition="status=:status order by post_date desc";
        $category_model->params = array(':status'=>1);
        return $category_model->getRecords();
    }

    public static function getCategoryDataById($id)
    {

        $category_model = new NewsCategoryModel();
        $category_model->condition="status=:status && id=:id";
        $category_model->params = array(':status'=>1,":id"=>$id);
        $find = $category_model->find();
        return array("title"=>$find->title,"url"=>$find->url);
    }

    public static function getNewsCategory($limit=50)
    {

        $category_model = new NewsCategoryModel();
        $category_model->limit = $limit;
        $category_model->condition="status=:status order by post_date desc";
        $category_model->params = array(':status'=>1);
        return $category_model->findAll();
    }

    public static function getPopularBlogArticle($limit = 15)
    {
        $model = new NewsArticleModel();
        $model->limit = $limit;
        $model->condition ="status=:status ORDER BY hits DESC";
        $model->params = array(":status"=>1);
        $latest_article = $model->findAll();
        if($latest_article){
            return $latest_article;
        }else{
            return array();;
        }
    }
    public static function getTrendingBlogArticle($limit=15)
    {
        $model = new NewsArticleModel();
        $model->limit = $limit;
        $model->condition ="status=:status and trending=:trending ORDER BY post_date DESC";
        $model->params = array(":status"=>1,":trending"=>1,);
        $latest_article = $model->findAll();
        if($latest_article){
            return $latest_article;
        }else{
            return array();
        }
    }

}
