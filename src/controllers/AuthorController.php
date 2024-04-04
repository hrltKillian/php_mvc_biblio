<?php

require_once '../src/repository/AuthorRepository.php';

class AuthorController extends Controller
{
    public function index($view, $method, $data = [])
    {
        if ($method == "all") {
            $this->all($view, $method, $data);
        } else if ($method == "one") {
            $this->one($view, $method, $data);
        } else if ($method == "edit") {
            $this->edit($view, $method, $data);
        } else {
            $this->view($view, $method, $data);
        }
    }

    public function all($view, $method, $data = [])
    {
        $authorRepository = new AuthorRepository();
        $authors = $authorRepository->findAll();
        $this->view($view, $method, $authors);
    }

    public function one($view, $method, $data = [])
    {
        $authorRepository = new AuthorRepository();
        $author = $authorRepository->findById($data[0]);
        $this->view($view, $method, $author);
    }

    public function edit($view, $method, $data = [])
    {
        $authorRepository = new AuthorRepository();
        $author = $authorRepository->findById($data[0]);
        $this->view($view, $method, $author);
    }
}