<?php

class TutorialModel extends MainModel
{


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "tble_tutorial";
    }

    public function getCategory() {
        $category_model = new CategoryModel();
        return $category_model->findAll();

    }

    public function getTutorialByCategoryUrl($category_url = NULL) {
        $category_model = new CategoryModel();
        $category_model->condition = "url =:url AND status =:status";
        $category_model->params = array(":url"=>$category_url,":status"=>1);
        if($find = $category_model->find()){
            $category_id= $find->id;
            $this->condition ="category_id =:id AND status =:status ORDER BY title ASC";
            $this->params = array(":id"=>$category_id,":status"=>1);
            $result = $this->findAll();
            if($result){
                return $result;
            }
        }else{
            return false;
        }
    }



    public function getSingleCategoryByUrl($url){
        $category_model = new CategoryModel();
        $category_model->condition = "url =:url AND status =:status";
        $category_model->params = array(":url"=>$url,":status"=>1);
        $find = $category_model->find();
        if($find){
            return $find;
        }else{
            return false;
        }
    }


}