<?php

require_once '../src/repository/LibraryRepository.php';

session_start();

class LibraryController extends Controller
{
    public function all(string $view, string $method, array $data = [])
    {
        $libraryRepository = new LibraryRepository();
        $libraries = $libraryRepository->findAll();
        $this->view($view, $method, $libraries);
    }

    public function one(string $view, string $method, array $data = [])
    {
        $libraryRepository = new LibraryRepository();
        $library = $libraryRepository->findById($data[0]);
        $library = [$library];
        $this->view($view, $method, $library);
    }

    public function edit(string $view, string $method, array $data = [])
    {
        $libraryRepository = new LibraryRepository();
        $library = $libraryRepository->findById($data[0]);
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $data = [$error, $library];
        $this->view($view, $method, $data);
    }

    public function update()
    {
        $libraryRepository = new LibraryRepository();
        $library = new Library();
        if ($_POST['name'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /library/edit/' . $_POST['id']);
            return;
        }
        $library->setId($_POST['id']);
        $library->setName($_POST['name']);
        $libraryRepository->update($library);
        header('Location: /library/all');
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
        $libraryRepository = new LibraryRepository();
        $library = new Library();
        if ($_POST['name'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /library/add');
            return;
        }
        if ($libraryRepository->findMissingId('library') == []) {
            $library->setId($libraryRepository->findLastId('library') + 1);
        } else {
            $library->setId($libraryRepository->findMissingId('library')[0]);
        }
        $library->setName($_POST['name']);
        $libraryRepository->save($library);
        header('Location: /library/all');
    }

    public function delete(string $view, string $method, array $data = [])
    {
        $libraryRepository = new LibraryRepository();
        $library = $libraryRepository->findById($data[0]);
        $library = [$library];
        $this->view($view, $method, $library);
    }

    public function deleted()
    {
        $libraryRepository = new LibraryRepository();
        $libraryRepository->deleteByLibraryId($_POST['id']);
        $libraryRepository->delete($_POST['id']);
        header('Location: /library/all');
    }
}