<div id="goods">
	<div>
		<img src="img_for_goods/<?php echo $results[$i]['img']?>" align="left">
		<p><?php echo $results[$i]['description']?><br>
		<b>Ціна: <?php echo $results[$i]['price']?>грн</b><br>
		<a href="index.php?id=<?php echo $results[$i]['link']?>">Детальніше</a></p>
	</div>
</div>