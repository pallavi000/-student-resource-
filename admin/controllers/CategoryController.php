<?php

class CategoryController extends MainController
{
    private $data = null;

    public function __construct()
    {
        $this->isLogedIn();
        $this->isRole(CONTROLLER);
        $this->data['category_model'] = $this->getModel("CategoryModel");
    }

    function index($value = NULL)
    {

        $this->data['title'] = ucfirst(CONTROLLER)." - Welcome page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);
        $model = $this->data['category_model'];

        /** TO DELETE ALL RECORDS*/
        if (isset($_POST['delete_all'])) {
            if (isset($_POST['checked'])) {
                $checked_id = $_POST['checked'];

                foreach ($checked_id as $id) {

                    $find = $model->findById($id);
                    $deleted = $model->deleteById($id);
                    if ($deleted === true) {
                        $this->setFlashedMessage("success", "All checked records successfully deleted!");
                    } else {
                        $this->setFlashedMessage("error", "Sorry, May be something wrong!!!");
                    }
                }
            }


        }



        $this->loadView(__FUNCTION__, $this->data);
    }

    public function create($value = NULL)
    {
        $this->data['title'] = "Create - ".CONTROLLER." page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);


        if (isset($_POST['cancel'])) {
            $this->redirect(CONTROLLER . "/index");
        }


        $model = $this->data['category_model'];
        if (isset($_POST[CONTROLLER])) {
            $model->attribute = $attribute = $_POST[CONTROLLER];

            $flag = true;
            if (empty($attribute['title'])) {
                $this->setFlashedMessage("error", "title must be required!");
                $flag = false;
            }
            if (empty($attribute['url'])) {
                $this->setFlashedMessage("error", "url must be required!");
                $flag = false;
            }

            if ($flag === true) {
                $insert = $model->insert();
                if ($insert === true) {
                    $this->setFlashedMessage("success", "Welldone,Successfully inserted!");
                    $this->redirect(CONTROLLER . "/index");
                } else if ($insert[1]) {
                    $this->setFlashedMessage("error", "Sorry, Duplicate entry.$insert[2]");
                    $this->redirect(CONTROLLER . "/create");
                }
            }


        }
        $this->loadView(__FUNCTION__, $this->data);


    }

    public function update($id = NULL)
    {
        if (!$id) {
            return false;
        }
        if (isset($_POST['cancel'])) {
            $this->redirect(CONTROLLER . "/index");
        }
        $this->data['title'] = "Update - Welcome page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);
        $model = $this->data['category_model'];
        $this->data['editableRecord'] = $editableRecord = $model->findById($id);


        if (isset($_POST[CONTROLLER])) {
            $model->attribute = $attribute = $_POST[CONTROLLER];
            $flag = true;
            if (empty($attribute['title'])) {
                $this->setFlashedMessage("error", "title must be required!");
                $flag = false;
            }
            if (empty($attribute['url'])) {
                $this->setFlashedMessage("error", "url must be required!");
                $flag = false;
            }

            if ($flag === true) {
                $update = $model->update($id);
                if ($update === true) {
                    $this->setFlashedMessage("success", ucfirst(CONTROLLER)." successfully updated");
                    $this->redirect(CONTROLLER . "/index");
                } else {

                    $this->setFlashedMessage("error", "Sorry, Try again") . $update[2];
                    $this->redirect(CONTROLLER . "/update");
                }
            }

        }

        $this->loadView(__FUNCTION__, $this->data);

    }

    public function delete($id = NULL)
    {
        if (!$id) {
            return false;
        }
        $model = $this->data['category_model'];
        $find = $model->findById($id);
        $delete = $model->deleteById($id);
        if ($delete === true) {
            @unlink($find->image);
            $this->setFlashedMessage("success", ucfirst(CONTROLLER)." successfully deleted!");
        } else {
            $this->setFlashedMessage("error", ucfirst(CONTROLLER)." not deleted!");
        }

        $this->redirect(CONTROLLER . "/index");


    }

    public function view($id = NULL)
    {
        if (!$id) {
            return false;
        }

        $this->data['title'] = "View - Welcome Page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);
        $model = $this->data['category_model'];
        $this->data['viewRecord'] = $viewRecord = $model->findById($id);
        $this->loadView("view", $this->data);


    }

    public function status($id = NULL)
    {
        if (!$id) {
            return false;
        }
        $model = $this->data['category_model'];;
        $model->changeStatus($id);
        $this->redirect(CONTROLLER . "/index");

    }



}
