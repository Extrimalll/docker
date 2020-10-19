<?php

class Home extends Controller{

    public function index(){
        global $loggedUser;
        $index = $this->model('Index');
        $this->view('home/index', ['user' => $loggedUser ]);
    }
        /*
        * метод login включает новый объект класса login
        * проверяет, предоставлены ли учетные данные пользователя POST, хеширование пароля с увеличенной алгоритмической сложностью
        * если это так, он проверяет правильность учетных данных пользователя, используя модель входа
        * иначе он переходит обратно на авторизацию с ошибкой
        */
    public function login(){
        $login = $this->model('Login');
        if( isset($_POST['login']) && isset($_POST['password']) ){
            $login->username = trim($_POST['login']);
            $login->password = trim($_POST['password']);
            $user = $login->getLogin('users', '*',$login->username);
            if (empty($user)) return $this->view('home/login', [ 'error' => 'loginError' ]);
            $check_pass = password_verify ($login->password,$user[0]['password']);
            //проверка на корректность данных
            if($check_pass){
                $new_hash = password_hash($login->password,PASSWORD_DEFAULT, array('cost' => 15));
                $login->UpdPass('users', $new_hash, $login->password);
                $_SESSION['log'] = $user[0]['login'];
                $_SESSION['hash'] = $user[0]['password'];
            }else{
            	$user = '';
			}
            if(!$user){
                $this->view('home/login', [ 'error' => 'loginError' ]);
            }else{
				$this->view('home/index', [ 'user' => $user ]);
            }
        }else{
			$this->view('home/login');
        }
    }

//деавторизация
    public function logout(){
            $logout = $this->model('Logout');
            $logout->userLogout();
            $this->view( 'home/login');
    }
}