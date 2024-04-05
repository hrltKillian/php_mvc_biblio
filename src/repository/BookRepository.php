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

}