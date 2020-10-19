<?php


class Login extends Database {


    //получение по логину
    function getLogin($db, $cols, $where='', $order='', $limit=''){
        $sql = $this->db->prepare("SELECT {$cols} FROM {$db} WHERE login = ?");
        $sql->execute(array($where));
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    //обновление хеша пароля
    function UpdPass($db, $cols='', $values=''){
        $sql = $this->db->prepare("UPDATE {$db} SET `password` = '{$cols}' where `login` = 'testtest'");
        $q = $sql->execute(array($values));
        if ($q)return true;
        else return false;
    }
}