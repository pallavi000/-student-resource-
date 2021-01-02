<?php

class UserController extends MainController
{
    private $data = null;

    public function __construct()
    {
        $this->isLogedIn();
        $this->isRole(CONTROLLER);
        $this->data['admin_model'] = $this->getModel("AdminModel");
    }


    function index($value = NULL)
    {


        $this->data['title'] = ucfirst(CONTROLLER) . " - Welcome page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);
        $model =$this->data['admin_model'];


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

    public function deleteAll()
    {

    }

    public function create($value = NULL)
    {

        $this->data['title'] = "Create - " . CONTROLLER . " page!";
        $this->data['session_value'] = $this->getSession(SESSION_KEY);
        $model = $this->data['admin_model'];

        if (isset($_POST['cancel'])) {
            $this->redirect(CONTROLLER . "/index");
        }


        if (isset($_POST[CONTROLLER])) {
            $model->attribute = $attribute = $_POST[CONTROLLER];
            $flag = true;
            if (empty($attribute['user_name'])) {
                $this->setFlashedMessage("error", "username must be required!");
                $flag = false;
            }
            if (empty($attribute['password'])) {
                $this->setFlashedMessage("error", "password must be required!");
                $flag = false;
            }
            if (!filter_var($model->attribute['email'], FILTER_VALIDATE_EMAIL)) {
                $this->setFlashedMessage("error", "email address not valid!");
                $flag = false;
            }

            if ($flag === true) {
                $model->attribute['password'] = md5($attribute['password']);
                // $model->attribute['secret_key'] = md5(microtime());
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
        $model = $this->data['admin_model'];
        $this->data['editableRecord'] = $editableRecord = $model->findById($id);


        if (isset($_POST[CONTROLLER])) {
            $model->attribute = $attribute = $_POST[CONTROLLER];
            $flag = true;
            if (empty($attribute['user_name'])) {
                $this->setFlashedMessage("error", "username must be required!");
                $flag = false;
            }
            if (empty($attribute['password'])) {
                $this->setFlashedMessage("error", "password must be required!");
                $flag = false;
            }
            if (!filter_var($model->attribute['email'], FILTER_VALIDATE_EMAIL)) {
                $this->setFlashedMessage("error", "email address not valid!");
                $flag = false;
            }

            if ($flag === true) {
                if ($model->attribute['password'] != $editableRecord->password) {
                    $model->attribute['password'] = md5($attribute['password']);
                }
                $update = $model->update($id);
                if ($update === true) {
                    $this->setFlashedMessage("success", "Records successfully updated");
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
        $data['model'] = $model = new AdminModel();
        $find = $model->findById($id);
        $delete = $model->deleteById($id);
        if ($delete === true) {
            @unlink($this->imgPath . $find->image);
            $this->setFlashedMessage("success", "Record successfully deleted!");
        } else {
            $this->setFlashedMessage("error", "Record successfully deleted!");
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
        $model = $this->data['admin_model'];
        $this->data['viewRecord'] = $viewRecord = $model->findById($id);

        $this->loadView("view", $this->data);


    }

    public function status($id = NULL)
    {
        if (!$id) {
            return false;
        }
        $model = $this->data['admin_model'];
        $model->changeStatus($id);
        $this->redirect(CONTROLLER . "/index");

    }


}
