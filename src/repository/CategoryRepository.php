<?php

class CategoryRepository extends EntityRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = self::connect();
    }

    /**
     * @return Category[]
     */
    public function findAll() : array
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    public function findById(int $id) : Category
    {
        $sql = "SELECT * FROM category WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode( PDO::FETCH_CLASS, Category::class);
        $stmt->execute();
        if ($stmt->rowCount() === 0) {
            $notFoundController = new NotFoundController();
            $notFoundController->index("a", "b");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function save(Category $category) : void
    {
        $sql = "INSERT INTO category (id, name) VALUES (:id, :name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $category->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':name', $category->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update(Category $category) : void
    {
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $category->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':name', $category->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete(int $id) : void
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    
}