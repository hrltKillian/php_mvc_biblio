<?php

require_once __DIR__.'/../entity/Author.php';
require_once __DIR__.'../../../public/config.php';

class EntityRepository
{
    public static function connect()
    {
        $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
        $pdo = new PDO($string, DBUSER, DBPWD);
        return $pdo;
    }

    public function query($query, $data = [])
    {
        $pdo = self::connect();
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findLastId(string $table)
    {
        $sql = "SELECT MAX(id) FROM $table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function findMissingId(string $table)
    {
        $sql = "SELECT id FROM $table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $missing = [];
        for ($i = 1; $i <= count($ids); $i++) {
            if (!in_array($i, $ids)) {
                $missing[] = $i;
            }
        }
        return $missing;
    }
}