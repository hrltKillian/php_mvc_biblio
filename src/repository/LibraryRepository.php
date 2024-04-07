<?php

class LibraryRepository extends EntityRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = self::connect();
    }

    /**
     * @return Library[]
     */
    public function findAll() : array
    {
        $sql = "SELECT * FROM library";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Library::class);
    }

    public function findById(int $id) : Library
    {
        $sql = "SELECT * FROM library WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode( PDO::FETCH_CLASS, Library::class);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function findByBookId(int $bookId) : array
    {
        $sql = "SELECT library.id, library.name FROM book JOIN book_library ON book.id = book_library.book_id JOIN library ON library.id = book_library.library_id WHERE book.id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Library::class);
    }

    public function save(Library $library) : void
    {
        $sql = "INSERT INTO library (id, name) VALUES (:id, :name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $library->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':name', $library->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function saveBookLibrary(int $id, int $bookId, int $librariesId) : void
    {
        $sql = "INSERT INTO book_library (id, book_id, library_id) VALUES (:id, :book_id, :library_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $stmt->bindParam(':library_id', $librariesId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update(Library $library) : void
    {
        $sql = "UPDATE library SET name = :name WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $library->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':name', $library->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete(int $id) : void
    {
        $sql = "DELETE FROM library WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteByLibraryId(int $libraryId) : void
    {
        $sql = "DELETE FROM book_library WHERE library_id = :library_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':library_id', $libraryId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteByBookId(int $bookId, array $book_library) : void
    {
        $sql = "DELETE FROM book_library WHERE book_id = :book_id AND library_id = :library_id";
        $stmt = $this->connection->prepare($sql);
        foreach ($book_library as $library) {
            $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
            $stmt->bindParam(':library_id', $library->getId(), PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function deleteByAuthorId(int $authorId) : void
    {
        $sql = "DELETE FROM book_library WHERE book_id IN (SELECT id FROM book WHERE author_id = :author_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteByCategoryId(int $categoryId) : void
    {
        $sql = "DELETE FROM book_library WHERE book_id IN (SELECT id FROM book WHERE category_id = :category_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
    }
}