<?php
$users = $obj->getAll();
echo "<p>Коментарів: ".count($users)."</p>";//кількість коментарів
foreach($users as $user){
	$id_comment = $user["id"];
	$n = $user["name"];
	$m = $user["msg"];
	$ip = $user["ip"];
	$dt = date("d-m-Y H:i:s", $user["datetime"]);
	/*Кнопку для видалення коментаря робимо видимлю тільки для адміністратора*/
	if($_SESSION['login'] === 'admin'){
		$class_hide_del_comment = '';
	}else{
		$class_hide_del_comment = 'class_hide';
	}
	/*Виводими отримані дані*/
	echo <<<LABEL
	<hr>
	<div>
		<div style="width:40%;float:left;"><b>Ім'я користувача: </b>$n</div>
		<div style="width:60%;float:left;text-align:right;"><b>Дата: </b>$dt <b>IP-адреса: </b>$ip</div>
		<div style="clear:both;"></div>
		<div><p>$m</p></div>
		<div class="$class_hide_del_comment" style="text-align:right;"><a href="delComment.php?id_com=$id_comment">Видалити коментар</a></div>
	</div>
LABEL;
}
?>