<?php

require_once '../src/repository/AuthorRepository.php';

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
        $authorRepository = new AuthorRepository();
        $authors = $authorRepository->findAll();
        $this->view($view, $method, $authors);
    }
}