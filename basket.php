<h2 style='text-align:center;'>Ваша корзина</h2>
<?php
/*Получаємо товари з корзини*/
$goods = myBasket();
if(!is_array($goods)){
	echo "Помилка при виводі товарів";
	exit;
}
if($goods){
	echo '<p>Перейти на сторінку <a href="index.php?id=goods">товарів</a></p>';
	?>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<th>N п/п</th>
			<th>Ноутбук</th>
			<th>Ціна, грн.</th>
			<th>Кількість</th>
			<th>Видалити</th>
		</tr>
		<?php
			$i = 1;//порядковий номер N п/п
			$sum=0;//сума
		foreach($goods as $item){
		?>
			<tr align="center">
				<td><?php echo $i?></td>
				<td><?php echo $item['description']?></td>
				<td><?php echo $item['price'] * $item['quantity']?></td>
				<td><?php echo $item['quantity']?></td>
				<td><a href="delete_from_basket.php?title=<?php echo $item['title']?>">Видалити</a></td><!--переходимо по силці і передаємо параметр товару-->
			</tr>
		<?php
			$i++;
			$sum += $item['price'] * $item['quantity'];
		}
		?>
	</table>

	<p><b>Всьго товарів в корзині на суму:</b> <?php echo $sum?>грн.</p>
	<div align="center">
		<a href="index.php?id=orderform">Оформити заказ!</a>
	</div>
	<?php
}else
	echo '<p>Корзина пуста! Перейти на сторінку <a href="index.php?id=goods">товарів</a></p>';//якщо пустий масив
?>