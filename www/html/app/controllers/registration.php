<?php

class Registration extends Controller{

	public function index(){
		global $loggedUser;
		$registr = $this->model('Registr');
		$this->view('registration/index', ['user' => $loggedUser ]);
	}
    /*
       * проверяет, предоставлены ли учетные данные пользователя POST, а также: совпадение паролей, проверка существующего логина, загрузка фото,хеширование пароля с увеличенной алгоритмической сложностью
       * если это так, он заносит данные в БД
       * иначе он переходит обратно на страницу регистрации с ошибкой
       */
    public function registrationUser(){
        $status = 'Произошла ошибка';
        if (!empty($_POST['loginReg'])){
            $reg = $this->model('Registr');
            if ($_POST['passwordReg'] != $_POST['passwordTwo']) return $this->view( 'registration/index',[ $status ]);
            $newPass = password_hash($_POST['passwordReg'],PASSWORD_DEFAULT, array('cost' => 15));
            $arrReg = array(
                'login' => $_POST['loginReg'],
                'nameUser' => $_POST['nameUser'],
                'passwordReg' => $newPass,
                'family' => $_POST['family'],
                'age' => $_POST['age'],
                'image' => $_FILES['image']['name']
            );
            if($_FILES['image']['name']){
                $this->uploadFiles($_FILES['image']);
            }
            $check = $reg->checkLogin('users', 'login', $arrReg['login']);
            if (empty($check)){
                $goodReg = $reg->registr($arrReg);
                if ($goodReg != 1)  return $this->view( 'registration/index',[ $status ]);

                $status = 'Вы успешно зарегестрировались';
                $this->view( 'registration/index', ['status' => $status ]);
            }
        }
        $this->view( 'registration/index', [ 'status' => $status ]);
    }

    public function uploadFiles($file){
        //проверка на размер файла
        if($file['size'] > 3000000)
        {
            exit;
        }
        //проверка на тип файла
        if(!preg_match('~\\.(?:jpe?g|png|gif)$~iu', $file['name']))
        {
            exit;
        }
        $uploaddir = './images/avatar'; //директория

        // cоздадим папку если её нет
        if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );
        $done_files = array();
        // переместим файл из временной директории в указанную
        $file_name = $file['name'];
        if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
                $done_files[] = realpath( "$uploaddir/$file_name" );
        }
    }
}