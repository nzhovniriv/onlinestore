<?php
/*Приймаємо дані*/
$name = $_POST['name'];
$message = $_POST['message'];
$to = 'nazarij_89@mail.ru';
$from = 'nzhovniriv@onlinestore.zzz.com.ua';
$subject = 'Message from online store Deshevshe.';
$headers = "From: $from\r\nReply-To: $from\r\nContent-Type: text/plain;charset=utf-8\r\n";
mail($to, $subject, $message, $headers);
header("Location: index.php?id=success_request");
?>