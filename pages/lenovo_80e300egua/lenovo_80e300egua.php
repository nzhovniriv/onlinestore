<!--Ноутбук Lenovo IdeaPad G50-45 (80E300EGUA)-->
<script type="text/javascript">
/*Масив картинок*/
var photo = ['record_181144667.jpg', 
			'record_181144732.jpg', 
			'record_181144797.jpg', 
			'record_181144862.jpg', 
			'record_181144927.jpg', 
			'record_181144992.jpg', 
			'record_181145057.jpg',
			'record_181145122.jpg'];

/*Функція для відображення картинки більшого розміру в блоці div#left_for_pages при кліку на картинку малого розміру*/
function changePhoto(){
	var imgChange = document.getElementById('photoAlbum');
	imgChange.src = this.src;//об'єкт, що згенерував цю подію це this, а саме посилання на картинку це this.src(тобто беремо src картинки, на якій клікнули)
};

window.onload = function(){
	/*Картинка по замовчуванню*/
	var index = 0;//індекс картинки, що відображатиметься по замовчуванню
	var imgFirst = document.getElementById('photoAlbum');
	imgFirst.src = 'pages/lenovo_80e300egua/img/'+photo[index];
	imgFirst.width = 430;
	
	/*Для горизонтального розміщення картинок на сторінці у зменшенному розміру*/
	var photoContainer = document.getElementById('photoContainer');
	for(var i = 0; i < photo.length; i++){
		var img = document.createElement('IMG');
		img.src = 'pages/lenovo_80e300egua/img/'+photo[i];
		img.width = 100;
		img.style.margin = '11px';
		img.style.cursor = 'pointer';
		img.onclick = changePhoto;
		photoContainer.appendChild(img);
	}
}
</script>
<?php
	$title_cat = '80E300EGUA';//змінна для вибору даних з таблиці store_catalog
	include "getDataFromCatalog.php";
?>
<div id="left_for_pages">
	<img id="photoAlbum">
</div>
<div id="right_for_pages">
	<h4>Ноутбук <?php echo $row_cat['description']?></h4>
	<h4>Ціна: <?php echo $row_cat['price']?>грн</h4>
	<p>Екран 15.6" (1366x768) HD LED, глянцевий / AMD A8-6410 (2.0 - 2.4 ГГц) / RAM 4 ГБ / HDD 500 ГБ / AMD Radeon R5 M230, 1 ГБ / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / без ОС / 2.5 кг / черный</p>
	<form action="add2basket.php">
		<p style="margin:6px; 0">Кількість: <input type="text" name="quantity" value="1" style="width:20px;height:20px;padding:0px;text-align:center"> шт.<input type="hidden" name="title" value="<?php echo $title_cat?>"></p>
		<p style="margin:6px; 0"><input type="image" src="img/button_basket.jpg"></p>
	</form>
</div>
<div id="clear_for_pages"></div>
<div id="main_for_pages">
	<div id="photoContainer"></div>
	<div>
		<h3>Характеристики</h3>
		<div>
			<div class="label_for_left_box">Процесор</div>
			<div class="label_for_right_box">Чотириядерний AMD Quad-Core A8-6410 (2.0-2.4 ГГц)</div>
		</div>
		<div>
			<div class="label_for_left_box">Оперативна пам`ять</div>
			<div class="label_for_right_box">4 ГБ DDR3L-1600 МГц</div>
		</div>
		<div>
			<div class="label_for_left_box">Жорсткий диск</div>
			<div class="label_for_right_box">500 ГБ</div>
		</div>
		<div>
			<div class="label_for_left_box">SSD накопичувач</div>
			<div class="label_for_right_box">Відсутній</div>
		</div>
		<div>
			<div class="label_for_left_box">Дисплей</div>
			<div class="label_for_right_box">15.6" (1366x768) WXGA HD</div>
		</div>
		<div>
			<div class="label_for_left_box">Графічний адаптер</div>
			<div class="label_for_right_box">Дискретний, AMD Radeon R5 M230, 1 ГБ</div>
		</div>
		<div>
			<div class="label_for_left_box">Оптичний привід</div>
			<div class="label_for_right_box">DVD SuperMulti</div>
		</div>
		<div>
			<div class="label_for_left_box">Система звуку</div>
			<div class="label_for_right_box">Dolby Advanced Audio</div>
		</div>
		<div>
			<div class="label_for_left_box">Бездротові комунікації</div>
			<div class="label_for_right_box">Wi-Fi 802.11 b/g/n, Bluetooth 4.0</div>
		</div>
		<div>
			<div class="label_for_left_box">Дротові комунікації</div>
			<div class="label_for_right_box">Fast Ethernet</div>
		</div>
		<div>
			<div class="label_for_left_box">Порти і Інтерфейси</div>
			<div class="label_for_right_box">1 порт USB 3.0 / 2 порти USB 2.0 / VGA / HDMI / LAN (RJ-45) / комбінований аудіороз`єм</div>
		</div>
		<div>
			<div class="label_for_left_box">Кардрідер</div>
			<div class="label_for_right_box">2-в-1 (SD/MMC)</div>
		</div>
		<div>
			<div class="label_for_left_box">Веб-камера</div>
			<div class="label_for_right_box">0.3 Мп</div>
		</div>
		<div>
			<div class="label_for_left_box">Батарея</div>
			<div class="label_for_right_box">Літій-полімерна, 4-х коміркова</div>
		</div>
		<div>
			<div class="label_for_left_box">Програмне забезпечення</div>
			<div class="label_for_right_box">Без ОС</div>
		</div>
		<div>
			<div class="label_for_left_box">Розміри</div>
			<div class="label_for_right_box">384 x 265 x 25 мм</div>
		</div>
		<div>
			<div class="label_for_left_box">Вага</div>
			<div class="label_for_right_box">2.5 кг</div>
		</div>
		<div>
			<div class="label_for_left_box">Додатково</div>
			<div class="label_for_right_box">Вбудований мікрофон<br>Стереофонічна аудіосистема з сертифікатом</div>
		</div>
		<div>
			<div class="label_for_left_box">Комплектація</div>
			<div class="label_for_right_box">Ноутбук<br>Батарея<br>Адаптер живлення<br>Керівництво користувача</div>
		</div>
		<div>
			<div class="label_for_left_box">3G</div>
			<div class="label_for_right_box">Немає</div>
		</div>
		<div>
			<div class="label_for_left_box">Гарантія</div>
			<div class="label_for_right_box">12</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<div>
<?php
define('DB_NAME_FOR_COMMENTS', 'lenovo_80e300egua.db');//ім'я бази даних
$_SESSION['const'] = DB_NAME_FOR_COMMENTS;//розміщаємо ім'я бази даних в сесії, щоб її значення потім получити в файлі savepost.php
include "Comment.class.php";//робота з базою даних
$obj = new Comment();
include "comment.php";
?>
</div>