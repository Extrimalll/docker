<?php 


class Logout extends Database {


    /*
    *Выход пользователя из системы путем уничтожения сессии
    */
    public function userLogout(){
        $_SESSION = array();
        session_destroy();                
    }


}