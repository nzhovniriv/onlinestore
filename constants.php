<?php
/*Костанти для підключення до сервева MySQL*/
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'online_store');/*ім'я бази даних*/

define('ORDERS_LOG', 'orders_log');/*тут будуть персональні дані користувачів*/
/*Корзина покупця*/
$basket = array();//корзина
$count = 0;//кількість товарів у корзині
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
basketInitial();
?>