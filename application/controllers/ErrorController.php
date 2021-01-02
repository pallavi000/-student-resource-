<?php

class errorController extends MainController
{
    public function page_not_found($value = NULL)
    {

        $data = array();
        $data['title'] = "Free Tutorials Learn Basic, Advanced and Project based tutorials | Tutorial's Center Point";
        $this->loadView("_error", $data);
    }



}

