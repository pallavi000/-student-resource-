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



    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",
            "title" => "Topic Title",
            "category_id" => "Category Type",
            "tutorials_id" => "Tutorial Type",
            "topic_type_id" => "Topic  Type",
            "url" => "Url",
            "hits" => "Hits",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",
            "title" => "Topic Title",
            "category_id" => "Category Type",
            "tutorials_id" => "Tutorial Type",
            "topic_type_id" => "Topic  Type",
            "url" => "Url",
            "seo_title" => "SEO Title",
            "seo_description" => "SEO Description",
            "hits" => "Hits",
            "status" => "Status"
        );
    }


}