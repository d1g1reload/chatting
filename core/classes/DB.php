<?php


class DB
{
    public function connect()
    {
        $db = new PDO("mysql:host=127.0.0.1; dbname=dbchat", "root", "Dgireload@12");
        return $db;
    }
}
