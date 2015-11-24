<?php
session_start();
define('DB_NAME_FOR_COMMENTS', "$_SESSION[const]");//така сама константа, значення якої беремр з $_SESSION[const]
$name = $_SESSION['login'];
include "Comment.class.php";
$obj = new Comment();
if(isset($_POST['com'])){
	$msg = $obj->clearData($_POST["msg"]);
	if(!empty($msg)){
		$res = $obj->savePost($name, $msg);
		header("Location: $_SERVER[HTTP_REFERER]");
	}else{
		$_SESSION['errMsg'] = "Заповніть поле для коментаря";
		header("Location: $_SERVER[HTTP_REFERER]");
	}
}
?>