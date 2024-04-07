<?php

class BookRepository extends EntityRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = self::connect();
    }

    /**
     * @return Book[]
     */
    public function findAll() : array
    {
        $sql = "SELECT * FROM book";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
    }

    public function findById(int $id) : Book
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode( PDO::FETCH_CLASS, Book::class);
        $stmt->execute();
        if ($stmt->rowCount() === 0) {
            $notFoundController = new NotFoundController();
            $notFoundController->index("a", "b");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function findByAuthor(int $id) : array
    {
        $sql = "SELECT * FROM book WHERE author_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
    }

    public function findByTitle(string $title) : array
    {
        $sql = "SELECT * FROM book WHERE title = :title";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Book::class);
    }

    public function findBook_library(int $id) : array
    {
        $sql = "SELECT library.id, library.name FROM book JOIN book_library ON book.id = book_library.book_id JOIN library ON library.id = book_library.library_id WHERE book.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Library::class);
    }

    public function save(Book $book) : void
    {
        $sql = "INSERT INTO book (id, title, author_id, category_id) VALUES (:id, :title, :author_id, :category_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $book->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':title', $book->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $book->getAuthorId(), PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $book->getCategoryId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update(Book $book) : void
    {
        $sql = "UPDATE book SET title = :title, author_id = :author_id, category_id = :category_id WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $book->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':title', $book->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $book->getAuthorId(), PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $book->getCategoryId(), PDO::PARAM_INT);
        $stmt->execute();
        $bookRepository = new BookRepository();
        $book = $bookRepository->findByTitle($_POST['title']);
        if (isset($_POST['library'])) {
            $libraryRepository = new LibraryRepository();
            $bookRepository = new BookRepository();
            $libraryRepository->deleteByBookId(end($book)->getId(), $bookRepository->findBook_library(end($book)->getId()));
            foreach ($_POST['library'] as $library) {
                if ($libraryRepository->findMissingId('book_library') == []) {
                    $id = $libraryRepository->findLastId('book_library') + 1;
                } else {
                    $id = $libraryRepository->findMissingId('book_library')[0];
                }
                $libraryRepository->saveBookLibrary($id, end($book)->getId(), $library);
            }
            
        }
    }

    public function delete(int $id) : void
    {
        $libraryRepository = new LibraryRepository();
        $bookRepository = new BookRepository();
        $libraryRepository->deleteByBookId($id, $bookRepository->findBook_library($id));

        $sql = "DELETE FROM book WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteByAuthorId(int $id) : void
    {
        $sql = "DELETE FROM book WHERE author_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteByCategoryId(int $id) : void
    {
        $sql = "DELETE FROM book WHERE category_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}