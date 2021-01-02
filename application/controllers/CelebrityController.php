<?php

class CelebrityController extends MainController
{
    private $data = null;
    public function __construct()
    {
        $this->data['celebrity_category_model'] = new CelebrityCategoryModel();
        $this->data['celebrity_article_model'] = new CelebrityArticleModel();
    }


    public function index($value = NULL)
    {
        $this->data['title'] = "Home - Celebrity";
        $this->data['seo_title'] = "biography, Wiki, Wife, Divorce, Girlfriend, Net Worth";
        $this->data['seo_description'] = "biography, Wiki, Wife, Divorce, Girlfriend, Net Worth, of singer, of actor, of actress, of player, of tv celebrity, of sport celebrity, celebrity, article";
        $this->loadView(__FUNCTION__, $this->data);
    }

    public function category($value = NULL)
    {
        $model = $this->data['celebrity_category_model'];
        $model->condition="status=:status && url=:url";
        $model->params = array(":status"=>1,":url"=>$value);
        $this->data['cat_data'] =$cat_data=  $model->find();
        $this->data['title'] = $cat_data->title;
        $this->data['seo_title'] = $cat_data->seo_title;
        $this->data['seo_description'] = $cat_data->seo_description;
        $this->loadView(__FUNCTION__, $this->data);
    }

    public function article($value = NULL)
    {
        $model = $this->data['celebrity_article_model'];
        $model->condition="status=:status && url=:url";
        $model->params = array(":status"=>1,":url"=>$value);
        $this->data['article_data']= $article_data=  $model->find();
        if(!$article_data){
            $this->redirect("error/_error");
        }
        $this->data['title'] = $article_data->title;
        $this->data['seo_title'] = $article_data->seo_title;
        $this->data['seo_description'] = $article_data->seo_description;
        $this->data['share_title'] = $article_data->title;
        $this->data['share_url'] = LINK_URL.CONTROLLER."/".__FUNCTION__."/".$article_data->url;
        $this->data['share_description'] = $article_data->summary;
        $this->data['share_image'] = $article_data->image;

        $this->loadView(__FUNCTION__, $this->data);
    }



}

