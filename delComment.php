<?php
session_start();
define('DB_NAME_FOR_COMMENTS', "$_SESSION[const]");//така сама константа, значення якої беремр з $_SESSION[const]
include "Comment.class.php";
$obj = new Comment();
$id_com = $_GET['id_com'];//отрммуємо id коментаря
$obj->deleteComment($id_com);//видаляємо коментар
header("Location: $_SERVER[HTTP_REFERER]");
?>