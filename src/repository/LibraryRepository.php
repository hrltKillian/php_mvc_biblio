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

    public function save(Library $library) : void
    {
        $sql = "INSERT INTO library (id, name) VALUES (:id, :name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $library->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':name', $library->getName(), PDO::PARAM_STR);
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
}