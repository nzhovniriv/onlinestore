<?php
include "lib/lib.inc.php";//підключення бібліотеки
include "constants.php";//костанти для підключення до сервева MySQL
	
$title = trim(strip_tags(($_GET['title'])));//приймаємо параметр title

/*якщо не пусто*/
if($title){
	deleteItemFromBasket($title);
	header("Location: $_SERVER[HTTP_REFERER]");
	exit;
}
?>