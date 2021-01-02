<?php

class Functions
{


    public static function getCategoryTitle($id = NULL)
    {

        $category_model = new CategoryModel();
        $record = $category_model->findById($id);
        if($record) {
            return $record->title." >>";
        }else{
            return "Main Category";
        }
    }

    public static function getTopicsTitle($topics_id = NULL){
        $topics_model = new TopicsModel();
        $topics_model->condition = "topics_id =:id";
        $topics_model->params = array(":id"=>$topics_id);
        $topics_result = $topics_model->find();
        if($topics_result){
            return $topics_result->title;
        }

    }

    public static  function getRole($user_id){
        $role_model = new RoleModel();
        $role_model->condition = "status = :status && user_id =:id";
        $role_model->params = array(":status"=>1,":id"=>$user_id);
        $role = $role_model->find();
        if($role){
            return $role;
        }else{
            return "site";
        }
    }

    public static function getController(){
        return array(
            "site" => "Dashboard",
            "user" => "User Management",
            "category" => "Category Management",
            "tutorial" => "Tutorial Management",
            "topic" => "Topic Category Management",
            "topics" => "Topics Management",
            "article" => "Article Management",
            "advertise" => "Advertise Management",
            "role" => "Role   Management",
            "gallery" => "Gallery   Management",
            "blogcategory" => "Blog  Category Management",
            "blogarticle" => "Blog  Article Management",
            "celebritycategory" => "Celebrity  Category Management",
            "celebrityarticle" => "Celebrity  Article Management",
        );
    }

    public static function SetFolderName(){
        return array(
            "news" => "News",
            "tutorial" => "Tutorial",
            "category" => "Category",
            "article" => "Article",
            "celebrity" => "Celebrity",
            "user" => "User",
            "icon" => "Icon",
            "ads" => "Ads"

        );
    }

    public static function SetAlignment(){
        return array(
            "top" => "Top",
            "bottom" => "Bottom",
            "left" => "Left",
            "right" => "Right",
        );
    }

    public static function SetColor(){
        return array(
            "1" => "primary",
            "2" => "success",
            "3" => "danger",
            "4" => "warning",
            "5" => "success",
            "6" => "danger",
            "7" => "warning",

        );
    }

    public static function getTutorialTitle($id = NULL)
    {


        $tutorial_model = new TutorialModel();
        $record = $tutorial_model->findById($id);
        if($record){
            return $record->title." >>";
        }else{
            return "Main Tutorial";
        }
    }

    public static function getTopicType($id = NULL)
    {

        $category_model = new TopicModel();
        $record = $category_model->findById($id);
        if($record) {
            return $record->type." >>";
        }else{
            return "Other type";
        }
    }
    public static function GetUserName($id = NULL)
    {

        $model = new AdminModel();
        $record = $model->findById($id);
        return $record->full_name;
    }

    public function getTopics() {

        $model = new TopicsModel();
        $model->condition = "status = :param1 ORDER BY post_date DESC";
        $model->params = array(":param1"=>'0');
        return $model->findAll();

    }
    public function getBlogCategory() {

        $model = new BlogCategoryModel();
        $model->condition = "status = :param1 ORDER BY post_date DESC";
        $model->params = array(":param1"=>'1');
        return $model->findAll();

    }
    public function getCelebrityCategory() {

        $model = new CelebrityCategoryModel();
        $model->condition = "status = :param1 ORDER BY post_date DESC";
        $model->params = array(":param1"=>'1');
        return $model->findAll();

    }
    public function getUsers() {

        $model = new AdminModel();
        $model->condition = "status = :param1 ORDER BY full_name DESC";
        $model->params = array(":param1"=>'1');
        return $model->findAll();

    }

    public function getStatusTitle($id) {

        if($id){
            return "<span class='text-success'>Active</span>";
        }else{
            return "<span class='text-danger'>In-Active</span>";
        }

    }







}

