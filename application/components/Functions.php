<?php

class Functions
{


    public static function getCategoryTitle($id = NULL)
    {

        $category_model = new CategoryModel();
        $record = $category_model->findById($id);
        if ($record) {
            return $record->title . " >>";
        } else {
            return "Main Category";
        }
    }

    public static function getTutorialTitle($id = NULL)
    {


        $tutorial_model = new TutorialModel();
        $record = $tutorial_model->findById($id);
        if ($record) {
            return $record->title . " >>";
        } else {
            return "Main Tutorial";
        }
    }

    public static function getTopicType($id = NULL)
    {

        $category_model = new TopicModel();
        $record = $category_model->findById($id);
        if ($record) {
            return $record->type . " >>";
        } else {
            return "Other type";
        }
    }



    public function getRelatedTutorial($id,$limit = 50)
    {
        $tutorial_model = new TutorialModel();
        $tutorial_model->limit = $limit;
        $record = $tutorial_model->findById($id);
        $sql = "SELECT * FROM $tutorial_model->tableName
WHERE id NOT IN ($id) and category_id=$record->category_id ORDER BY post_date DESC limit 10";
        $result = $tutorial_model->findAllBySql($sql);
        return $result;


    }

    public function getRelatedCategory($id,$limit = 50)
    {
        $tutorial_model = new CategoryModel();
        $tutorial_model->limit = $limit;
        $record = $tutorial_model->findById($id);
        $sql = "SELECT * FROM $tutorial_model->tableName
WHERE id NOT IN ($id) and category_id=$record->category_id ORDER BY post_date DESC limit 10";
        $result = $tutorial_model->findAllBySql($sql);
        return $result;


    }

    public function getRemainingTutorial($id = array(),$limit = 50)
    {
        $tutorial_model = new TutorialModel();
        $tutorial_ids = array();
        foreach ($id as $row){
            $tutorial_ids[] = $row->id;
        }
        $ids = implode(", ",$tutorial_ids);
        $sql = "SELECT * FROM $tutorial_model->tableName
WHERE id NOT IN ($ids) ORDER BY post_date DESC LIMIT $limit";
        return $tutorial_model->findAllBySql($sql);



    }

    public function getRelatedTopics($category_id,$limit=50)
    {
        $topics_model = new TopicsModel();
        $topics_model->limit = $limit;
        $topics_model->condition = "status=:status && category_id=:id ORDER BY post_date DESC";
        $topics_model->params = array(":status" => 1, ":id" => $category_id);
        $relatedTopics = $topics_model->findAll();
        if ($relatedTopics) {
            return $relatedTopics;
        } else {
            return false;
        }

    }



    public static function getMainCategory($limit=50)
    {
        $model = new CategoryModel();
        $model->limit = $limit;
        $model->condition = "category_self_id = :id AND status =:status ORDER BY title ASC ";
        $model->params = array(":id" => '0', ":status" => '1');
        return $model->findAll();

    }

    public static function getMainTutorial($limit=50)
    {
        $model = new TutorialModel();
        $model->limit = $limit;
        $model->condition = "tutorial_self_id = :id AND status =:status ORDER BY title ASC";
        $model->params = array(":id" => '0', ":status" => 1);
        return $model->findAll();


    }

    public static function getPopularArticle($limit=15)
    {
        $model = new ArticleModel();
        $model->limit = $limit;
        $model->condition ="status=:status ORDER BY hits DESC";
        $model->params = array(":status"=>1);
        return $model->findAll();

    }

    public static function getlatestArticle($limit=15)
    {
        $model = new ArticleModel();
        $model->limit = $limit;
        $model->condition ="status=:status ORDER BY post_date DESC";
        $model->params = array(":status"=>1);
        $latest_article = $model->findAll();
        if($latest_article){
            return $latest_article;
        }else{
            return false;
        }

    }


}

