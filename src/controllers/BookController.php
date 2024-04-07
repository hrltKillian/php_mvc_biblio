<?php

require_once '../src/repository/BookRepository.php';
require_once '../src/repository/AuthorRepository.php';
require_once '../src/repository/CategoryRepository.php';
require_once '../src/repository/LibraryRepository.php';

session_start();

class BookController extends Controller
{
    public function all(string $view, string $method, array $data = [])
    {
        $bookRepository = new BookRepository();
        $books = $bookRepository->findAll();
        $this->view($view, $method, $books);
    }

    public function one(string $view, string $method, array $data = [])
    {
        $bookRepository = new BookRepository();
        $book = $bookRepository->findById($data[0]);
        $authorRepository = new AuthorRepository();
        $author = $authorRepository->findById($book->getAuthorId());
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->findById($book->getCategoryId());
        $book->setAuthor($author);
        $book->setCategory($category);
        $libraryRepository = new LibraryRepository();
        $book->setLibrary($libraryRepository->findByBookId($book->getId()));

        $book = [$book];
        $this->view($view, $method, $book);
    }

    public function edit(string $view, string $method, array $data = [])
    {
        $bookRepository = new BookRepository();
        $book = $bookRepository->findById($data[0]);
        $authorRepository = new AuthorRepository();
        $authors = $authorRepository->findAll();
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAll();
        $libraryRepository = new LibraryRepository();
        $libraries = $libraryRepository->findAll();
        $library = $libraryRepository->findByBookId($book->getId());
        $book->setLibrary($library);
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $data = [$error, $book, $authors, $categories, $libraries];
        $this->view($view, $method, $data);
    }

    public function update()
    {
        $bookRepository = new BookRepository();
        $book = new Book();
        if ($_POST['title'] == "" || $_POST['author'] == "" || $_POST['category'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /book/edit/' . $_POST['id']);
            return;
        }
        $book->setId($_POST['id']);
        $book->setTitle($_POST['title']);
        $book->setAuthorId($_POST['author']);
        $book->setCategoryId($_POST['category']);
        $bookRepository->update($book);
        header('Location: /book/all');
    }

    public function add(string $view, string $method, array $data = [])
    {
        $authorRepository = new AuthorRepository();
        $authors = $authorRepository->findAll();
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAll();
        $libraryRepository = new LibraryRepository();
        $libraries = $libraryRepository->findAll();
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $data = [$error, $authors, $categories, $libraries];
        $this->view($view, $method, $data);
    }

    public function insert()
    {
        $bookRepository = new BookRepository();
        $book = new Book();
        if ($_POST['title'] == "" || $_POST['author'] == "" || $_POST['category'] == "") {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /book/add');
            return;
        }
        if ($bookRepository->findMissingId('book') == []) {
            $book->setId($bookRepository->findLastId('book') + 1);
        } else {
            $book->setId($bookRepository->findMissingId('book')[0]);
        }
        $book->setTitle($_POST['title']);
        $book->setAuthorId($_POST['author']);
        $book->setCategoryId($_POST['category']);
        $bookRepository->save($book);

        $book = $bookRepository->findByTitle($_POST['title']);
        
        if (isset($_POST['library'])) {
            $libraryRepository = new LibraryRepository();
            foreach ($_POST['library'] as $library) {
                if ($libraryRepository->findMissingId('book_library') == []) {
                    $id = $libraryRepository->findLastId('book_library') + 1;
                } else {
                    $id = $libraryRepository->findMissingId('book_library')[0];
                }
                $libraryRepository->saveBookLibrary($id, end($book)->getId(), $library);
            }
        }
        header('Location: /book/all');
    }

    public function delete(string $view, string $method, array $data = [])
    {
        $bookRepository = new BookRepository();
        $book = $bookRepository->findById($data[0]);
        $book = [$book];
        $this->view($view, $method, $book);
    }

    public function deleted()
    {
        $bookRepository = new BookRepository();
        $bookRepository->delete($_POST['id']);
        header('Location: /book/all');
    }
}