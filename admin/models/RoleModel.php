<?php

class RoleModel extends MainModel
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_role";
    }

    public function getFieldLabel()
    {
        return array(
            "post_date" => "Assigning. Date",
            "user_id" => "Assign To",
            "role" => "Role",

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",
            "user_id" => "Assign To",
            "role" => "Role",
            "date" => "Date",
            "status" => "Status"

        );
    }


}