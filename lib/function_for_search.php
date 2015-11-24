<?php
function searchGoods($words){
	/*Щоб пошук відбувався по кожному слову, в залежності від того скільки слів у нас є*/
	$query_search = "";//для оператора OR якщо у нас 2 слова і більше
	$arraywords = preg_split("/[ ]+/", $words);//Розбиває рядок за допомогою роздільника(в нашому випадку пробіл)
	foreach($arraywords as $key => $value){
		if(isset($arraywords[$key - 1])) $query_search .= " OR ";//коли у нас перший елемент, то отримаємо перший елемент - 1(який не існує), щоб добавити оператор OR(який після WHERE не поставиться)
		$query_search .= "description LIKE '%$value%'";
	}
	$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$result_set = mysqli_query($mysqli, "SELECT img, description, price, link FROM goods WHERE $query_search ORDER BY description");
	mysqli_close($mysqli);
	$array_for_search = array();//тут зберігатимуться дані пошуку
	while($row = mysqli_fetch_assoc($result_set)){
		$array_for_search[] = $row;
	}
	return $array_for_search;
}
?>