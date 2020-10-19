<?php

//Конфигурация для cообщениях об ошибках
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

//константы
define('URL_PUBLIC_FOLDER', '');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

//константы БД
define('DB_HOST', 'db');
define('DB_NAME', 'test');
define('DB_USER', 'root');
define('DB_PASS', 'pass');

define('DB_CHARSET', 'utf8');