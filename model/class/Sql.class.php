<?php

class Sql extends PDO
{
    const db = "mysql:host=localhost;dbname=anamnese,testdb,testdb";

    public static function connect()
    {
        $link = explode(',', self::db);
        $conn = new PDO($link[0], $link[1], $link[2]);
        return $conn;
    }
}
