<?php

class AdminModel extends MainModel
{

    public $username = NULL;
    public $password = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_admin";
    }

    public function loginCheck()
    {
    

        $this->condition = " user_name = :username AND password = :password AND status =:status";
        $this->params = array(":username" => $this->username, ":password" => md5($this->password), ":status" => '1');
$find = $this->find();

        if ($find) {
            $this->attribute['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
            $this->attribute['last_login_date'] = date('Y-m-d H:i:s'); //H:m:s
            $this->params = array();
            $this->update($find->id);
            return $find;
        }

        return false;
    }

    public function getFieldLabel()
    {
        return array(
            "post_date" => "Regd. Date",
            "full_name" => "Full Name",
            "user_name" => "User Name",
            "email" => "Email",
            "mobile_number" => "Phone No.",
            "address" => "Address",
            "image" => "Image",
            "status" => "Status"

        );
    }


    public function getAllFields()
    {
        return array(
            "post_date" => "Regd. Date",
            "full_name" => "Full Name",
            "user_name" => "User Name",
            "email" => "Email",
            "address" => "Address",
            "mobile_number" => "Phone No.",
            "image" => "Image",
            "last_login_ip" => "Last Login Ip Address",
            "last_login_date" => "Last Login Date",
            "status" => "Status"

        );
    }


}