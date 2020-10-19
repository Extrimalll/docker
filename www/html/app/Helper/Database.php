<?php

/*
*
класс содержит функции управления базой данных
*/
class Database {

    protected $db;
    function __construct(){
        $this->openDatabaseConnection();
    }

    private function openDatabaseConnection($db='test', $host='localhost', $user='root', $password='test')
    {
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASS);
        return $this->db;
    }

}