<?php

namespace tests;

require_once 'register.php';
use PHPUnit\Framework\TestCase;
class RegisterTest extends TestCase
{
    public function testRegistration()
    {
        //Подключаем БД
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "onlineshop";
        $con = mysqli_connect($servername, $username, $password,$db);

        // Подготавливаем данные для регистрации
        $first_name = 'Test';
        $last_name = ' User';
        $email = 'testuser@mail.ru';
        $password = 'testuser';
        $mobile = '1234567890';
        $address1 = 'testuser';
        $address2 = 'testuser';

        // Вызываем функцию регистрации
        $sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`) 
		VALUES (NULL, '$first_name', '$last_name', '$email', 
		'$password', '$mobile', '$address1', '$address2')";
        $run_query = mysqli_query($con, $sql);
        $result = $run_query;

        // Проверяем, что функция вернула true
        $this->assertTrue($result);

        // Ищем созданного пользователя в базе данных
        $sql = "SELECT * FROM user_info WHERE email = '$email' LIMIT 1" ;
        $user = mysqli_query($con, $sql)->fetch_assoc();

        // Проверяем, что пользователь найден в базе данных
        $this->assertNotEmpty($user);

        // Проверяем, что имя пользователя записано корректно
        $this->assertEquals($first_name, $user['first_name']);

        // Проверяем, что email пользователя записан корректно
        $this->assertEquals($email, $user['email']);

        // Проверяем, что пароль пользователя записан корректно
        $this->assertEquals($password, $user['password']);
    }
}