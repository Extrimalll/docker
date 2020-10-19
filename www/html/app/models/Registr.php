<?php

class Registr extends Database {
    //вызов конструктора, объявленный в родительском классе
    function __construct(){
        parent::__construct();
    }
    //получение по логину
    function checkLogin($db, $cols, $where='', $order='', $limit=''){
        $sql = $this->db->prepare("SELECT {$cols} FROM {$db} WHERE login = ?");
        $sql->execute(array($where));
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    //регистрация
    public function registr($arr){
        $user = $this->db->prepare("INSERT INTO `users` (`login`, `password`,  `username`, `family`, `age`, `img`) 
        VALUES (:login, :password, :username, :family, :age, :img)")->execute (array( 'login' => $arr['login'], 'password' => $arr['passwordReg']
        , 'username' => $arr['nameUser'], 'family' => $arr['family'], 'age' => $arr['age'], 'img' => $arr['image'] ));
        if ($user == 1) return $user;
        else return 0;
    }
}