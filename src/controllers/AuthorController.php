<?php

require_once '../src/repository/AuthorRepository.php';

session_start();

class AuthorController extends Controller
{
    public function all(string $view, string $method, array $data = [])
    {
        $authorRepository = new AuthorRepository();
        $authors = $authorRepository->findAll();
        $this->view($view, $method, $authors);
    }

    public function one(string $view, string $method, array $data = [])
    {
        $authorRepository = new AuthorRepository();
        $author = $authorRepository->findById($data[0]);
        $this->view($view, $method, $author);
    }

    public function edit(string $view, string $method, array $data = [])
    {
        $authorRepository = new AuthorRepository();
        $author = $authorRepository->findById($data[0]);
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $data = [$error, $author];
        $this->view($view, $method, $data);
    }

    public function update()
    {
        $authorRepository = new AuthorRepository();
        $author = new Author();
        if ($_POST['firstname'] == "" || $_POST['lastname'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /author/edit/' . $_POST['id']);
            return;
        }
        $author->setId($_POST['id']);
        $author->setFirstname($_POST['firstname']);
        $author->setLastname($_POST['lastname']);
        $authorRepository->update($author);
        header('Location: /author/all');
    }

    public function add(string $view, string $method, array $data = [])
    {
        if (isset($_SESSION['error'])) {
            $data[0] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $this->view($view, $method, $data);
    }

    public function insert()
    {
        $authorRepository = new AuthorRepository();
        $author = new Author();
        if ($_POST['firstname'] == "" || $_POST['lastname'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /author/add');
            return;
        }
        if ($authorRepository->findMissingId('author') == []) {
            $author->setId($authorRepository->findLastId('author') + 1);
        } else {
            $author->setId($authorRepository->findMissingId('author')[0]);
        }
        $author->setFirstname($_POST['firstname']);
        $author->setLastname($_POST['lastname']);
        $authorRepository->save($author);
        header('Location: /author/all');
    }

}