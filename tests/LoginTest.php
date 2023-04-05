<?php

namespace tests;
require_once 'login.php';
require_once 'store.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        //Подключаем БД
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "onlineshop";
        $con = mysqli_connect($servername, $username, $password, $db);

        // Подготавливаем данные для регистрации
        $email = 'testuser@mail.ru';
        $password = 'testuser';

        // Вызываем функцию входа
        $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
        $run_query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($run_query);
        $this->assertTrue((bool) $count);
    }
}