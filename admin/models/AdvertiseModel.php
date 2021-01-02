<?php

class AdvertiseModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_advertise";
    }



    public function getFieldLabel()
    {
        return array(

            "post_date" => "Regd. Date",
            "title" => "Title",
            "alignment" => "Alignment Position",
            "belongs_page" => "Ads Page",
            "style" => "Ads CSS Style",
            "url" => "Ads Url",
            "code" => "Code",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",

            "title" => "Title",
            "alignment" => "Alignment Position",
            "belongs_page" => "Ads Page",
            "style" => "Ads CSS Style",
            "code" => "Code",
            "url" => "Ads Url",

            "status" => "Status"

        );
    }


}