<?php


class Controller{

    public function model($model){

			require_once 'app/models/Session.php';
            global $loggedUser;
            $session = new Session;
            $loggedUser = $session->checkSession();

          /*
            * Сравнение запрошенной модели со статусом пользователя
            * если пользователь залогинен не может запросить модель входа
            * если пользователь не вошел в систему, он перенаправит его на модель входа
            */
            if(!$loggedUser && $model != 'Login'  && $model != 'Registr' ){
                header('Location: ' . URL  . LANGUAGE .'/home/login');
            }elseif($loggedUser && $model == 'Login'){
                header('Location: ' . URL  . LANGUAGE .'/home/index');
            }elseif($loggedUser && $model == 'Index' && !strripos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'Index')){
                header('Location: ' . URL  . LANGUAGE .'/home/index');
            }
            require_once 'app/models/' . $model . '.php';
            return new $model();
    }


    /*
    * вызывается функция view для создания объекта класса view
    * включает необходимые языки
    * загружает темплейт сайта.
    */

    public function view($view, $data = []){
        /*
        * A main langauge file called main contains main variables like site name and description in different languages
        * every view should have the language file with the same name contains an associative array called
        * lang = array('key' => 'value');
        * in the language directory
        */
        if(!isset($data[0]['lang']['main'])){
            require_once("app/languages/" . LANGUAGE . "/main.php");
            /* $lang is an array that is defined in the language file. */
            $data['lang']['main'] = LANGUAGE;
        }
        $data['view'] = $view;
        if(!isset($data['lang'][$view])){
            require_once("app/languages/" . LANGUAGE . "/". $view .".php");
            /* $lang is an array that is defined in the language file. */
            $data['lang'][$view] = LANGUAGE;
        }

        //including the header, the view and the footer
        require_once 'app/views/layout/header.php';
        require_once 'app/views/' . $view . '.php';
        require_once 'app/views/layout/bottomForm.php';
        require_once 'app/views/layout/footer.php';
		return ($data);
    }

}