<?php
/*Ф-я для приведення до типу integer*/
function clearInt($data){
	return abs((int)$data);
}
/*Ф-я для оброблення даних типу string*/
function clearStr($data){
	global $link;//імпорт змінної $link
	return mysqli_real_escape_string($link, trim(strip_tags(($data))));
}
/*ф-я якщо користувач хіба прийшов*/
function basketInitial(){
	global $basket, $count;
	/*ф-я завжди буде запускатися для корзини або якщо корзини немає - треба її створити(новий користувач) присвоїти ID і послати cookie, або cookie вже є і треба зачитати*/
	if(!isset($_COOKIE['basket'])){
		$basket = array('orderid' => uniqid());
		saveBasket();
	}else{
		$basket = unserialize(base64_decode($_COOKIE['basket']));
		/*print_r($basket);//провіряємо чи є там ID*/
		$count = count($basket) - 1;//тому що у нас завжди там є orderid в 1-у елементі
	}
}
/*ф-я для збереження корзини з товарами в cookie*/
function saveBasket(){
	global $basket;
	$basket = base64_encode(serialize($basket));//сереалізуємо масив в стрічку, бо корзина в нас буде у cookie(base64_encode щоб ще раз сереалізувати, так як у нас можуть бути апострофи і стрічка буде битою, в результаті чого не можливою стане десереалізація)
	setcookie('basket', $basket, 0x7FFFFFFF);
}
/*ф-я для збереження товару в корзину*/
function add2Basket($title, $q){
	//$q - к-ть, по замовчуванню 1
	global $basket;
	$basket[$title] = $q;//добавляємо елемент
	saveBasket();
}
/*ф-я вибірки товарів з корзини*/
function myBasket(){
	global $link, $basket;
	$goods = array_keys($basket);//вибираємо ключі, але там є orderid 1-им елементом, який нам не потрібен(отримуємо масив з усіма ключами)
	array_shift($goods);
	if(!count($goods))//якщо пусто(тобто 0), верни пустий масив
		return array();
	$titles = implode(",", $goods);//перетворюємо масив в стрічку
	$titles_re = str_replace(",", "','", $titles);
	//return $titles_re;
	$sql = "SELECT title, description, price FROM store_catalog WHERE title IN ('$titles_re')";
	if(!$result = mysqli_query($link, $sql)) return false;//якщо помилка
	/*Визиваємо result2Array() і отримаємо або масив або false*/
	$items = result2Array($result);
	/*Так як результати запиту більше не потрібні, звільняємо пам'ять зайняту результатами запиту*/
	mysqli_free_result($result);
	return $items;
}
/*ф-я, яка приймає результат виконання ф-ї myBasket і повертає ассоціативний масив товарів, що доповнений к-тю*/
function result2Array($data){
	global $basket;
	$arr = array();//проміжний масив, який будемо повертати
	while($row = mysqli_fetch_assoc($data)){
		$row['quantity'] = $basket[$row['title']];//в $row додаємо параметр quantity, який лежить в $basket[$row['title']]
		$arr[] = $row;
	}
	return $arr;
}
function deleteItemFromBasket($title){
	global $basket;
	unset($basket[$title]);//видаляємо елемент з певним $id
	saveBasket();//перезберігаємо корзину
}
function saveOrder($dt){
	global $link, $basket;
	/*У нас вже є вибірка товарів(myBasket())*/
	$goods = myBasket();
	foreach($goods as $item){
		mysqli_query($link, "INSERT INTO store_orders(title, description, price, quantity, orderid, datetime) VALUES('$item[title]', '$item[description]', $item[price], $item[quantity],'$basket[orderid]', $dt)");
	}
	setcookie('basket', '', time() - 3600);//видаляємо cookie
}
function getOrders(){
	global $link;
	/*Файл створюється тільки після першого заказу, тому перевіряємо*/
	if(!is_file('orders/'.ORDERS_LOG)) return false;
	/*Зачитуємо файл*/
	$orders = file('orders/'.ORDERS_LOG);
	$allOrders = array();
	
	foreach($orders as $order){
		//$order - тут приходить стрічка, яку неохідно розбити
		list($name, $email, $phone, $address, $oid, $dt) = explode('|', $order);
		$orderinfo = array();//проміжний масив
		/*заповнюємо масив $orderinfo*/
		$orderinfo['name'] = $name;
		$orderinfo['email'] = $email;
		$orderinfo['phone'] = $phone;
		$orderinfo['address'] = $address;
		$orderinfo['orderid'] = $oid;
		$orderinfo['dt'] = $dt;
		$sql = "SELECT description, price, quantity FROM store_orders WHERE orderid = '$oid'";
		if(!$result = mysqli_query($link, $sql)) return false;
		$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		/*ячейка для даних з бд*/
		$orderinfo['goods'] = $items;
		$allOrders[] = $orderinfo;//вставляємо в масив $allOrders
	}
	return $allOrders;
}
?>
