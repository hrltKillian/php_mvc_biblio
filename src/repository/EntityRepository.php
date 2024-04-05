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
}