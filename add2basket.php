<?php
include "lib/lib.inc.php";//���������� ��������
include "constants.php";//�������� ��� ���������� �� ������� MySQL
	
$title = $_GET['title'];
$q = clearInt($_GET['quantity']);;
add2Basket($title, $q);
header("Location: $_SERVER[HTTP_REFERER]");
exit;
?>