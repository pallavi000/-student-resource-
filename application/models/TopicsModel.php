<?php

class TopicsModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_topics";
    }

    public function getCategory() {
        $category_model = new CategoryModel();
        return $category_model->findAll();

    }

    public function getTutorials() {
        $tutorial_model = new TutorialModel();
        return $tutorial_model->findAll();

    }





    public function getTopicType(){
        $tt_model = new TopicModel();
        return $tt_model->findAll();
    }



}