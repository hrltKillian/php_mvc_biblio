<?php

class AuthorRepository extends EntityRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = self::connect();
    }

    /**
     * @return Author[]
     */
    public function findAll() : array
    {
        $sql = "SELECT * FROM author";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Author::class);
    }

    public function findById(int $id) : Author
    {
        $sql = "SELECT * FROM author WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode( PDO::FETCH_CLASS, Author::class);
        $stmt->execute();
        if ($stmt->rowCount() === 0) {
            $notFoundController = new NotFoundController();
            $notFoundController->index("a", "b");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function save(Author $author) : void
    {
        $sql = "INSERT INTO author (id, firstname, lastname) VALUES (:id, :firstname, :lastname)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $author->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':firstname', $author->getFirstname(), PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $author->getLastname(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update(Author $author) : void
    {
        $sql = "UPDATE author SET firstname = :firstname, lastname = :lastname WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $author->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':firstname', $author->getFirstname(), PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $author->getLastname(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete(int $id) : void
    {
        $sql = "DELETE FROM author WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}