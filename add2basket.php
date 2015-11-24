<?php
include "lib/lib.inc.php";//підключення бібліотеки
include "constants.php";//костанти для підключення до сервева MySQL
	
$title = $_GET['title'];
$q = clearInt($_GET['quantity']);;
add2Basket($title, $q);
header("Location: $_SERVER[HTTP_REFERER]");
exit;
?>