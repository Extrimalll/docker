<?php

/*
* Session class to start a session on every and check user login. 
*
*/

class Session extends Database {

    //вызов конструктора, объявленный в родительском классе
    function __construct(){
        parent::__construct();
        session_start(); // старт сессии
             
     }
    // проверка сессии
    function checkSession(){
        if (isset($_SESSION['hash'])){
            require_once 'app/models/Login.php';
            $login = new Login();
            $user = $login->getLogin('users', '*',$_SESSION['log']);

			if ($user) return $user;
            /*
            * проверить, существует ли логин пользователя в базе данных, возвращает false, если нет
            * если пользователь существует, массив содержит информацию о пользователях.
            */
        }
        return false;

    }
}