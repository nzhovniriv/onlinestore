<!--Ноутбук Lenovo Z51-70 (80K6008EUA)-->
<script type="text/javascript">
/*Масив картинок*/
var photo = ['lenovo_80k6008eua_984489455.jpg', 
			'lenovo_80k6008eua_984489546.jpg', 
			'lenovo_80k6008eua_984489637.jpg', 
			'lenovo_80k6008eua_984489728.jpg', 
			'lenovo_80k6008eua_984495370.jpg', 
			'lenovo_80k6008eua_984495888.jpg', 
			'lenovo_80k6008eua_984495475.jpg',
			'lenovo_80k6008eua_984495622.jpg'];

/*Функція для відображення картинки більшого розміру в блоці div#left_for_pages при кліку на картинку малого розміру*/
function changePhoto(){
	var imgChange = document.getElementById('photoAlbum');
	imgChange.src = this.src;//об'єкт, що згенерував цю подію це this, а саме посилання на картинку це this.src(тобто беремо src картинки, на якій клікнули)
};

window.onload = function(){
	/*Картинка по замовчуванню*/
	var index = 0;//індекс картинки, що відображатиметься по замовчуванню
	var imgFirst = document.getElementById('photoAlbum');
	imgFirst.src = 'pages/lenovo_80k6008eua/img/'+photo[index];
	imgFirst.width = 430;
	
	/*Для горизонтального розміщення картинок на сторінці у зменшенному розміру*/
	var photoContainer = document.getElementById('photoContainer');
	for(var i = 0; i < photo.length; i++){
		var img = document.createElement('IMG');
		img.src = 'pages/lenovo_80k6008eua/img/'+photo[i];
		img.width = 100;
		img.style.margin = '11px';
		img.style.cursor = 'pointer';
		img.onclick = changePhoto;
		photoContainer.appendChild(img);
	}
}
</script>
<?php
	$title_cat = '80K6008EUA';//змінна для вибору даних з таблиці store_catalog
	include "getDataFromCatalog.php";
?>
<div id="left_for_pages">
	<img id="photoAlbum">
</div>
<div id="right_for_pages">
	<h4>Ноутбук <?php echo $row_cat['description']?></h4>
	<h4>Ціна: <?php echo $row_cat['price']?>грн</h4>
	<p>Екран 15.6" TN (1920x1080) Full HD LED, матовий / Intel Core i5-5200U (2.2 ГГц) / RAM 8 ГБ / HDD 1 ТБ / AMD R9 M375, 2 ГБ / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / HD веб-камера / Free DOS / 2.3 кг</p>
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
			<div class="label_for_right_box">Двоядерний Intel Core i5-5200U (2.2 ГГц)</div>
		</div>
		<div>
			<div class="label_for_left_box">Оперативна пам`ять</div>
			<div class="label_for_right_box">8 ГБ 1600 МГц DDR3L</div>
		</div>
		<div>
			<div class="label_for_left_box">Жорсткий диск</div>
			<div class="label_for_right_box">1 ТБ</div>
		</div>
		<div>
			<div class="label_for_left_box">SSD накопичувач</div>
			<div class="label_for_right_box">Відсутній</div>
		</div>
		<div>
			<div class="label_for_left_box">Дисплей</div>
			<div class="label_for_right_box">15.6" TN (1920x1080) Full HD LED, матовий</div>
		</div>
		<div>
			<div class="label_for_left_box">Графічний адаптер</div>
			<div class="label_for_right_box">Дискретний, AMD R9 M375, 2 ГБ виділеної відеопам`яті</div>
		</div>
		<div>
			<div class="label_for_left_box">Оптичний привід</div>
			<div class="label_for_right_box">DVD Super Multi</div>
		</div>
		<div>
			<div class="label_for_left_box">Система звуку</div>
			<div class="label_for_right_box">HDA (High Definition Audio)</div>
		</div>
		<div>
			<div class="label_for_left_box">Бездротові комунікації</div>
			<div class="label_for_right_box">Wi-Fi 802.11 b/g/n, Bluetooth 4.0</div>
		</div>
		<div>
			<div class="label_for_left_box">Дротові комунікації</div>
			<div class="label_for_right_box">Gigabit Ethernet</div>
		</div>
		<div>
			<div class="label_for_left_box">Порти і Інтерфейси</div>
			<div class="label_for_right_box">1 x USB 2.0 / 2 x USB 3.0 / HDMI / VGA / LAN (RJ-45) / комбінований аудіороз`єм</div>
		</div>
		<div>
			<div class="label_for_left_box">Кардрідер</div>
			<div class="label_for_right_box">4-в-1(SD/SDHC/SDXC/MMC)</div>
		</div>
		<div>
			<div class="label_for_left_box">Веб-камера</div>
			<div class="label_for_right_box">1 Мп (HD720p)</div>
		</div>
		<div>
			<div class="label_for_left_box">Батарея</div>
			<div class="label_for_right_box">4-х коміркова, 32 Вт*год</div>
		</div>
		<div>
			<div class="label_for_left_box">Програмне забезпечення</div>
			<div class="label_for_right_box">DOS</div>
		</div>
		<div>
			<div class="label_for_left_box">Розміри</div>
			<div class="label_for_right_box">384 x 265 x 24.6 мм</div>
		</div>
		<div>
			<div class="label_for_left_box">Вага</div>
			<div class="label_for_right_box">2.3 кг</div>
		</div>
		<div>
			<div class="label_for_left_box">Додатково</div>
			<div class="label_for_right_box">Вбудований мікрофон<br>Підсвітка клавіатури<br>Клавіатура AccuType<br>Стереофонічні динаміки JBL з підтримкою технології Dolby DS 1.0<br>Home Theater</div>
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
define('DB_NAME_FOR_COMMENTS', 'lenovo_80k6008eua.db');//ім'я бази даних
$_SESSION['const'] = DB_NAME_FOR_COMMENTS;//розміщаємо ім'я бази даних в сесії, щоб її значення потім получити в файлі savepost.php
include "Comment.class.php";//робота з базою даних
$obj = new Comment();
include "comment.php";
?>
</div>