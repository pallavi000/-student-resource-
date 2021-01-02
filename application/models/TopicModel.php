<?php

class TopicModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_topic_type";
    }

}