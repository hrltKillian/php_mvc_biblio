<?php

require_once '../src/repository/CategoryRepository.php';
require_once '../src/repository/BookRepository.php';
require_once '../src/repository/LibraryRepository.php';

session_start();

class CategoryController extends Controller
{
    public function all(string $view, string $method, array $data = [])
    {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAll();
        $this->view($view, $method, $categories);
    }

    public function one(string $view, string $method, array $data = [])
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->findById($data[0]);
        $category = [$category];
        $this->view($view, $method, $category);
    }

    public function edit(string $view, string $method, array $data = [])
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->findById($data[0]);
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $data = [$error, $category];
        $this->view($view, $method, $data);
    }

    public function update()
    {
        $categoryRepository = new CategoryRepository();
        $category = new Category();
        if ($_POST['name'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /category/edit/' . $_POST['id']);
            return;
        }
        $category->setId($_POST['id']);
        $category->setName($_POST['name']);
        $categoryRepository->update($category);
        header('Location: /category/all');
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
        $categoryRepository = new CategoryRepository();
        $category = new Category();
        if ($_POST['name'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /category/add');
            return;
        }
        if ($categoryRepository->findMissingId('category') == []) {
            $category->setId($categoryRepository->findLastId('category') + 1);
        } else {
            $category->setId($categoryRepository->findMissingId('category')[0]);
        }
        $category->setName($_POST['name']);
        $categoryRepository->save($category);
        header('Location: /category/all');
    }

    public function delete(string $view, string $method, array $data = [])
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->findById($data[0]);
        $category = [$category];
        $this->view($view, $method, $category);
    }

    public function deleted()
    {
        $categoryRepository = new CategoryRepository();
        $bookRepository = new BookRepository();
        $libraryRepository = new LibraryRepository();
        $libraryRepository->deleteByCategoryId($_POST['id']);
        $bookRepository->deleteByCategoryId($_POST['id']);
        $categoryRepository->delete($_POST['id']);
        header('Location: /category/all');
    }
}