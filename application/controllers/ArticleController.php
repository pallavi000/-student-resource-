<?php

class ArticleController extends MainController
{
    private $data = null;
    public function __construct()
    {
        $this->data['model'] = $model = new ArticleModel();
        $this->data['tutorials_model']= $model_tutorials = new TutorialModel();
    }


    public function index($value = NULL)
    {


        $tutorial_result = $this->data['model']->getTutorialByUrl($value);
        $article_result = $this->data['model']->getHomePageArticle($tutorial_result->id);


        if($article_result){
            $this->setSession(TUTORIAL_ID,$tutorial_result->url);
            $this->data['tutorial_result'] = $tutorial_result;
            $this->data['topic_types'] =$this->data['model']->getTopicTypesByTutorialUrl($value);
            $this->data['topics'] = $this->data['model']->getTopicsByTutorialUrl($value);

            $this->data['advertise'] = $this->data['model']->getAllAds();
            $this->data['articles'] =$article_result;
            $this->data['seo_description'] =$article_result->seo_description;
            $this->data['seo_title'] =$article_result->seo_title;
            $this->data['title'] =$article_result->title;
            $this->data['share_title'] = $article_result->title;
            $this->data['share_url'] = LINK_URL.CONTROLLER."/".__FUNCTION__."/".$article_result->url;
            $this->data['share_description'] = $article_result->summary;
            $this->data['share_image'] = $tutorial_result->image;


        }else{
            $this->data['tutorial_image'] = false;
        }

        $this->loadView(__FUNCTION__, $this->data);
    }


    public function details($value = NULL)
    {


        $single_topics = $this->data['model']->getSingleTopicsBySelectedUrl($value);
        $single_tutorials = $this->data['tutorials_model']->findById($single_topics->tutorials_id);
        if($single_tutorials){
            $this->setSession(TUTORIAL_ID,$single_tutorials->url);
        }
        $url = $this->getSession(TUTORIAL_ID);
        $topics = $this->data['model']->getTopicsByTutorialUrl($url);
        $tutorial_result = $this->data['model']->getTutorialByUrl($url);
        $article_result = $this->data['model']->getArticle($single_topics->id);
        $hits = $this->data['model']->histIncrease($value);

        if($article_result){
            $this->data['topic_types'] = $this->data['model']->getTopicTypesByTutorialUrl($url);
            $this->data['topics'] = $topics;
            $this->data['advertise'] = $this->data['model']->getAllAds();
            $this->data['articles'] = $article_result;
            $this->data['seo_description'] =$article_result->seo_description;
            $this->data['seo_title'] =$article_result->seo_title;
            $this->data['title'] =$article_result->title;
            $this->data['tutorial_result'] = $tutorial_result;
            $this->data['prev_url'] = $d = $this->data['model']->getPrev($single_topics->id,$single_topics->tutorials_id);
            $this->data['next_url'] = $e = $this->data['model']->getNext($single_topics->id,$single_topics->tutorials_id);
            $this->data['share_title'] = $article_result->title;
            $this->data['share_url'] = LINK_URL.CONTROLLER."/".__FUNCTION__."/".$article_result->url;
            $this->data['share_description'] = $article_result->summary;
            $this->data['share_image'] = $tutorial_result->image;
        }else{
            $this->data['articles'] = false;;
        }


        $this->loadView(__FUNCTION__, $this->data);
    }


}

