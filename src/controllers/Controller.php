<?php
abstract class Controller
{
    public $ALLOWED_METHODS = ['index', 'one', 'insert', 'add', 'all', 'edit'];

    public function view($view, $method, $data = [])
    {
        if (file_exists("../templates/" .$view. "/" .$method. ".html.php")) {
            require "../templates/" .$view. "/" .$method. ".html.php";
        } else {
            require "../templates/notFound/index.html.php";
        }
    }
}