<?php
	/*Виведення товарних позицій списком
	//Масив веб-сторінок
	$goods = array("Ноутбук HP ProBook 450 (L8A66ES)"=>"index.php?id=hp_probook_450_l8a66es",
					"Ноутбук HP ProBook 470 (F7Y26ES)"=>"index.php?id=hp_probook_470_f7y26es", 
					"Ноутбук HP Pavilion 17-e183sr (G5E26EA)"=>"index.php?id=hp_pavilion_17_e183sr_g5e26ea",
					"Ноутбук HP 250 G3 (J4T60EA)"=>"index.php?id=hp_250_g3_j4t60ea",
					"Ноутбук Asus X751MA (X751MA-TY117D)"=>"index.php?id=asus_x751ma-ty117d",
					"Ноутбук Asus X751LDV (X751LDV-TY163D) White"=>"index.php?id=asus_x751ldv_ty163d",
					"Ноутбук Asus Zenbook UX305FA (UX305FA-FC064H) Black"=>"index.php?id=asus_zenbook_ux305fa_fc064h",
					"Ноутбук Asus X555LB (X555LB-XO141D) Dark Brown"=>"index.php?id=asus_x555lb-xo141d",
					"Ноутбук Lenovo Z51-70 (80K6008EUA)"=>"index.php?id=lenovo_80k6008eua",
					"Ноутбук Lenovo IdeaPad G50-45 (80E300EGUA)"=>"index.php?id=lenovo_80e300egua",
					"Ноутбук Lenovo G50-30 (80G001T3UA)"=>"index.php?id=lenovo_g50_30_80g001t3ua",
					"Ноутбук Lenovo G70-80 (80FF004PUA) Black"=>"index.php?id=lenovo_g7080_80fg003pua");
	ksort($goods);//сортуємо масив по ключах, зберігаючи відносини між ключами і значеннями
	//Виведення списком
	echo "<ul>";
		foreach ($goods as $link=>$href){
			echo "<li style='list-style-type:none;padding:5px;'><a href=\"$href\">$link</a></li>";
		}
	echo "</ul>";*/

	$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$result = mysqli_query($mysqli, "SELECT img, description, price, link FROM goods ORDER BY description");
	while($goods = mysqli_fetch_assoc($result)){//получаємо результат запиту у вигляді масиву
		?>
		<div id="goods">
			<div>
				<img src="img_for_goods/<?php echo $goods['img']?>" align="left">
				<p><?php echo $goods['description']?><br>
				<b>Ціна: <?php echo $goods['price']?>грн</b><br>
				<a href="index.php?id=<?php echo $goods['link']?>">Детальніше</a></p>
			</div>
		</div>
		<?php
	}
	echo "<div id='clear_for_goods'></div>";
	mysqli_close($mysqli);
?>