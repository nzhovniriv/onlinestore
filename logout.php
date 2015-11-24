<?php
/*Продовжуємо сесії*/
session_start();
/*Видаляємо дані з сесії*/
unset($_SESSION['login']);
unset($_SESSION['password']);
header("Location: index.php");//повертаємося на попередню сторінку
?>