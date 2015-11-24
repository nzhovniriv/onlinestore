<?php
session_start();

include "lib/lib.inc.php";//підключення бібліотеки
include "constants.php";//костанти для підключення до сервева MySQL

if(isset($_POST['buy'])){
	$customer = clearStr($_POST['customer']);
	$email = clearStr($_POST['email']);
	$phone = clearStr($_POST['phone']);
	$address = clearStr($_POST['address']);
	$oid = $basket['orderid'];
	$dt = time();
	
	if(empty($customer) || empty($email) || empty($phone) || empty($address)){
		$_SESSION['error_enter'] = 1;//якщо хоча б одне поле пусте
		header("Location: $_SERVER[HTTP_REFERER]");
	}else{
		$order = "$customer|$email|$phone|$address|$oid|$dt\n";
		file_put_contents('orders/'.ORDERS_LOG, $order, FILE_APPEND);
		saveOrder($dt);//$dt в базі час заказу також будемо зберігати*/
		header("Location: index.php?id=success_order");
	}
}
?>