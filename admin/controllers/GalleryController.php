<?php

class GalleryController extends MainController
{
    private $data = array();
    public $ImgPath = null;

    public function __construct()
    {
        $this->isLogedIn();
        $this->isRole(CONTROLLER);
        $this->data['images_model'] = new ImagesModel();


    }

    function index($value = NULL)
    {
        $this->data['title'] = "Create - " . CONTROLLER . " page!";

        $model = $this->data['images_model'];
        if (isset($_POST[CONTROLLER])) {
            $model->attribute = $attribute = $_POST[CONTROLLER];
            $images = $_FILES[CONTROLLER];
            $countfiles = count($images['name']['image']);
            $flag = true;

            if (($attribute['gallery']) == '0') {
                $this->setFlashedMessage("error", "Select at least one gallery");
                $flag = false;
            }



                if (!isset($_FILES[CONTROLLER]) && empty($_FILES[CONTROLLER]['name'])) {
                    $this->setFlashedMessage("error", "Please Choose Image...");
                    $flag = false;
                }

            for ($i = 0; $i < $countfiles; $i++) {
                if ($images['error']['image'][$i] != 0) {
                    $this->setFlashedMessage("error", "File unsupported or may be corrupt!");
                    $flag = false;
                }

                @$file_ext = strtolower(end(explode('.', $images['name']['image'][$i])));
                $expensions = array("jpeg", "jpg", "png", "tif", "gif","docx","pdf");
                if (in_array($file_ext, $expensions) === false) {
                    $this->setFlashedMessage("error", "Extension not allowed, please choose a JPEG, JPG, PNG, TIF or GIF file!");
                    $flag = false;
                }

                if ($images['size']['image'][$i] > 5242880) {
                    $this->setFlashedMessage("error", "File size must be less than 5 MB"); //1mb = 1024kb = 1048576b
                    $flag = false;
                }


                if ($flag === true) {

                    if (!is_dir(ROOT . "/uploaded/" . $attribute['gallery'])) {
                        mkdir(ROOT . "/uploaded/" . $attribute['gallery']);
                    }
                    $final_image_name = date("Ymd") . "_" . $images['name']['image'][$i];
                    $uploaded_folder = "uploaded/" . $attribute['gallery'] . "/";
                    $model->attribute['image_path'] = '';

                    $move = move_uploaded_file($images['tmp_name']['image'][$i], $uploaded_folder . $final_image_name);
                    if ($move) {
                        $this->setFlashedMessage("success", "Files are uploaded");
                    }


                }
            }


        }

        $this->loadView(__FUNCTION__, $this->data);
    }

    public function deleteImage($data = NULL)

    {
        $res = explode('-', $data);
        @unlink("uploaded/" . $res[0] . '/' . $res[1]);
        $this->redirect(CONTROLLER . "/index");
    }
}