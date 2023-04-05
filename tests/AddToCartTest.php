<?php

namespace tests;
require_once 'action.php';

use PHPUnit\Framework\TestCase;

class AddToCartTest extends TestCase
{
    public function testAddToCart()
    {
        //Подключаем БД
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "onlineshop";
        $con = mysqli_connect($servername, $username, $password, $db);

        //Задаем переменные
        $p_id = 1;
        $user_id = 33;
        $ip_add = '::1';

        //Получаем товары
        $sql = "INSERT INTO `cart`
        (`p_id`, `ip_add`, `user_id`, `qty`) 
        VALUES ('$p_id','$ip_add','$user_id','1')";
        $res = mysqli_query($con, $sql);
        $this->assertTrue($res);
    }
}