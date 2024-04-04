<?php

require_once __DIR__.'/../entity/Author.php';
class EntityRepository
{
    public static function connect()
    {
        $string = "mysql:host=localhost;dbname=librery_v2";
        $pdo = new PDO($string, "root", "");
        return $pdo;
    }

    public function query($query, $data = [])
    {
        $pdo = self::connect();
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}