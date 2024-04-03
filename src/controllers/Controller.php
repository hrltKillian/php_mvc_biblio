<?php

class Controller
{
    public $ALLOWED_METHODS = ['add', 'all', 'edit'];

    public function view($view, $method, $data = [])
    {
        if (file_exists("../templates/" .$view. "/" .$method. ".html.php")) {
            require "../templates/" .$view. "/" .$method. ".html.php";
        } else {
            require "../templates/404/index.html.php";
        }
    }
}