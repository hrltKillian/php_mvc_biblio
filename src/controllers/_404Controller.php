<?php

class _404Controller extends Controller
{
    public function index($view, $method, $data = [])
    {
        $this->view($view, $method);
    }
}