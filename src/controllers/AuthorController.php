<?php

class AuthorController extends Controller
{
    public function index($view, $method, $data = [])
    {
        if ($method == "all") {
            $this->all($view, $method);
        } else {
            
        }
    }

    public function all($view, $method, $data = [])
    {
        $this->view($view, $method);
    }
}