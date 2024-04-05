<?php

class notFoundController extends Controller
{
    public function index($view, $method, $data = [])
    {
        $this->view($view, $method);
    }
}