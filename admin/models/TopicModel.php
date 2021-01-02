<?php

class TopicModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_topic_type";
    }



    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",

            "type" => "Topic Type",

            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",

            "type" => "Topic Type",

            "status" => "Status"

        );
    }


}