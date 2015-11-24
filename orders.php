<h2 style='text-align:center;'>Отримані закази</h2>
<?php
$orders = getOrders();
/*echo "<pre>";
	print_r($orders);
echo "</pre>";*/
foreach($orders as $order){
	
?>
<hr>
<h2>Заказ номер: <?php echo $order['orderid']?></h2>
<p><b>Покупець</b>: <?php echo $order['name']?></p>
<p><b>E-mail</b>: <?php echo $order['email']?></p>
<p><b>Телефон</b>: <?php echo $order['phone']?></p>
<p><b>Адреса доставки</b>: <?php echo $order['address']?></p>
<p><b>Дата заказу</b>: <?php echo date('d-m-Y H:i:s', $order['dt']*1);//приведення до числового типу дати?></p>

<h3 style='text-align:center;'>Куплені товари:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Ноутбук</th>
	<th>Ціна, грн.</th>
	<th>Кількість</th>
</tr>
<?php
	$i = 1;//порядковий номер N п/п
	$sum=0;//сума
foreach($order['goods'] as $item){
?>
	<tr align="center">
		<td><?php echo $i?></td>
		<td><?php echo $item['description']?></td>
		<td><?php echo $item['price'] * $item['quantity']?></td>
		<td><?php echo $item['quantity']?></td>
	</tr>
<?php
	$i++;
	$sum += $item['price'] * $item['quantity'];
}
?>
</table>
<p>Всьго товарів в заказі на суму: <?php echo $sum?>грн.</p>
<?php
}//end of foreach
?>