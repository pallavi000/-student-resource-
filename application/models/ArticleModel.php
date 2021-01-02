<?php

class ArticleModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_article";
    }
public function histIncrease($url)
    {
        //$topic_model = new TopicsModel();
        $sql = "UPDATE $this->tableName SET hits = hits+1 WHERE url = :url";
        $this->params =array(":url"=>$url);
        $this->updateBySql($sql);
    }




    public function getTopics()
    {

        $topic_model = new TopicsModel();
        return $topic_model->findAll();

    }

    public function getAllAds(){
        $adv_model = new AdvertiseModel();
        $adv_model->condition = "status =:status";
        $adv_model->params = array(":status"=>1);
        $record = $adv_model->findAll();
        if($record){
            return $record;
        }else{
            return false;
        }
    }

    /*public function getTutorialIdByUrl($url = null){
        $tutorial_model = new TutorialModel();
        $tutorial_model->condition = "url =:url AND status =:status";
        $tutorial_model->params = array(":url"=>$url,":status"=>1);

        if($find = $tutorial_model->find()){
            return $find;
        }else{
            return false;
        }
    }*/

    public function getTutorialByUrl($tutorial_url = null)
    {
        $tutorial_model = new TutorialModel();
        $tutorial_model->condition = "url =:url AND status =:status";
        $tutorial_model->params = array(":url" => $tutorial_url, ":status" => 1);
        if ($find = $tutorial_model->find()) {
            return $find;
        } else {
            return false;
        }
    }

    public function getNext($topics_id, $tutorials_id)
    {
        $topics_model = new TopicsModel();
        $sql = "SELECT * FROM $topics_model->tableName WHERE id > :id AND tutorials_id = :tutorials_id AND status=:status ORDER BY post_date ASC LIMIT 1";
        $topics_model->params = array(":id" => $topics_id, ":tutorials_id" => $tutorials_id, ":status" => 1);
        $row = $topics_model->findBySql($sql);
        if ($row) {
            return $row->url;
        } else {
            return false;
        }
    }

    public function getPrev($topics_id, $tutorials_id)
    {
        $topics_model = new TopicsModel();
        $sql = "SELECT * FROM $topics_model->tableName WHERE id < :id AND tutorials_id = :tutorials_id AND status=:status ORDER BY post_date ASC LIMIT 1";
        $topics_model->params = array(":id" => $topics_id, ":tutorials_id" => $tutorials_id, ":status" => 1);
        $row = $topics_model->findBySql($sql);
        if ($row) {
            return $row->url;
        } else {
            return false;
        }
    }

    public function getArticle($topics_id)
    {
        $this->condition = "topics_id =:id AND status =:status";
        $this->params = array(":id" => $topics_id, ":status" => 1);
        $record = $this->find();
        if ($record) {
            return $record;
        } else {
            return false;
        }

    }

   public function findTutorialUrlById($id){
       $tutorial_model = new TutorialModel();


       $tutorial_model->condition = "id =:id AND status =:status";
       $tutorial_model->params = array(":id" => $id, ":status" => 1);
       $find = $tutorial_model->find();
       return $find;
   }

    /*public function getArticle($tutorial_id,$topic_url) {
        $topic_model = new TopicsModel();
       // select * from table order by col limit 1;
        $topic_model->condition = "tutorials_id =:id AND url =:url AND status =:status";
        $topic_model->params = array(":id"=>$tutorial_id,":url"=>$topic_url,":status"=>1);
        if($find = $topic_model->find()) {

            $this->condition = "topics_id =:id AND status =:status";
            $this->params = array(":id" => $find->id, ":status" => 1);
            return $this->find();

        }else{
            return false;
        }

    }*/
    public function getHomePageArticle($tutorial_id)
    {
        $topic_model = new TopicsModel();
        // select * from table order by col limit 1;
        $topic_model->condition = "tutorials_id =:id AND status =:status ORDER BY id ASC Limit 1";
        $topic_model->params = array(":id" => $tutorial_id, ":status" => 1);
        if ($find = $topic_model->find()) {

            $this->condition = "topics_id =:id AND status =:status";
            $this->params = array(":id" => $find->id, ":status" => 1);
            return $this->find();

        } else {
            return false;
        }

    }

    public function getTopicsByTutorialUrl($tutorial_url = null)
    {
        $tutorial_model = new TutorialModel();
        $topic_model = new TopicsModel();

        $tutorial_model->condition = "url =:url AND status =:status";
        $tutorial_model->params = array(":url" => $tutorial_url, ":status" => 1);
        if ($find = $tutorial_model->find()) {
            $tutorial_id = $find->id;
            $topic_model->limit = 1000;
            $topic_model->condition = "tutorials_id =:id AND status =:status ORDER BY post_date ASC";
            $topic_model->params = array(":id" => $tutorial_id, ":status" => 1);
            return $result = $topic_model->findAll();
            
        } else {
            return false;
        }
    }

    public function getSingleTopicsBySelectedUrl($topics_url = null)
    {
        $topic_model = new TopicsModel();
        $topic_model->condition = "url =:url AND status =:status";
        $topic_model->params = array(":url" => $topics_url, ":status" => 1);
        $result = $topic_model->find();;
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTopicTypesByTutorialUrl($tutorial_url = null)
    {
        $tutorial_model = new TutorialModel();
        $model_type = new TopicModel();
        $topic_model = new TopicsModel();
        $tutorial_model->condition = "url =:url AND status =:status";
        $tutorial_model->params = array(":url" => $tutorial_url, ":status" => 1);

        if ($find = $tutorial_model->find()) {
            $tutorial_id = $find->id;
            $topic_model->condition = "tutorials_id =:id AND status =:status";
            $topic_model->params = array(":id" => $tutorial_id, ":status" => 1);
            $result = $topic_model->findAllByFieldDistinct("topic_type_id");
            $type = array();

            foreach ($result as $row) {
                $type[] = $model_type->findById($row->topic_type_id);
            }
            //print_r($type);
            //exit;
            return $type;
        } else {
            return false;
        }
    }


}