<?php

require_once '../src/repository/BookRepository.php';

session_start();

class BookController extends Controller
{
    public function all(string $view, string $method, array $data = [])
    {
        $bookRepository = new BookRepository();
        $books = $bookRepository->findAll();
        $this->view($view, $method, $books);
    }
}