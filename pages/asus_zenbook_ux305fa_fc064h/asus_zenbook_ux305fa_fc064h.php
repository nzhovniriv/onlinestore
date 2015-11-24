<!--Ноутбук Asus Zenbook UX305FA (UX305FA-FC064H) Black-->
<script type="text/javascript">
/*Масив картинок*/
var photo = ['record_850421732.jpg', 
			'record_850421823.jpg', 
			'record_850421914.jpg', 
			'record_850422103.jpg', 
			'record_850422208.jpg', 
			'record_850422432.jpg', 
			'record_850422544.jpg', 
			'record_850422733.jpg', 
			'record_850422824.jpg', 
			'record_850423006.jpg'];

/*Функція для відображення картинки більшого розміру в блоці div#left_for_pages при кліку на картинку малого розміру*/
function changePhoto(){
	var imgChange = document.getElementById('photoAlbum');
	imgChange.src = this.src;//об'єкт, що згенерував цю подію це this, а саме посилання на картинку це this.src(тобто беремо src картинки, на якій клікнули)
};

window.onload = function(){
	/*Картинка по замовчуванню*/
	var index = 0;//індекс картинки, що відображатиметься по замовчуванню
	var imgFirst = document.getElementById('photoAlbum');
	imgFirst.src = 'pages/asus_zenbook_ux305fa_fc064h/img/'+photo[index];
	imgFirst.width = 430;
	
	/*Для горизонтального розміщення картинок на сторінці у зменшенному розміру*/
	var photoContainer = document.getElementById('photoContainer');
	for(var i = 0; i < photo.length; i++){
		var img = document.createElement('IMG');
		img.src = 'pages/asus_zenbook_ux305fa_fc064h/img/'+photo[i];
		img.width = 100;
		img.style.margin = '11px';
		img.style.cursor = 'pointer';
		img.onclick = changePhoto;
		photoContainer.appendChild(img);
	}
}
</script>
<?php
	$title_cat = 'UX305FA-FC064H';//змінна для вибору даних з таблиці store_catalog
	include "getDataFromCatalog.php";
?>
<div id="left_for_pages">
	<img id="photoAlbum">
</div>
<div id="right_for_pages">
	<h4>Ноутбук <?php echo $row_cat['description']?></h4>
	<h4>Ціна: <?php echo $row_cat['price']?>грн</h4>
	<p>Екран 13.3" (1920x1080) IPS Full HD LED, матовий / Intel Core M-5Y10 (0.8 - 2.0 ГГц) / RAM 4 ГБ / SSD 256 ГБ / Intel HD Graphics 5300 / без ОД / Wi-Fi / Bluetooth 4.0 / веб-камера / Windows 8.1 / 1.2 кг / чорний / сумка</p>
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
			<div class="label_for_right_box">Двоядерний Intel Core M-5Y10 (0.8 - 2.0 ГГц)</div>
		</div>
		<div>
			<div class="label_for_left_box">Оперативна пам`ять</div>
			<div class="label_for_right_box">4 ГБ 1600 МГц DDR3L</div>
		</div>
		<div>
			<div class="label_for_left_box">SSD накопичувач</div>
			<div class="label_for_right_box">256 ГБ</div>
		</div>
		<div>
			<div class="label_for_left_box">Дисплей</div>
			<div class="label_for_right_box">13.3" (1920x1080) IPS Full HD LED, матовий</div>
		</div>
		<div>
			<div class="label_for_left_box">Графічний адаптер</div>
			<div class="label_for_right_box">Інтегрований, Intel HD Graphics 5300</div>
		</div>
		<div>
			<div class="label_for_left_box">Оптичний привід</div>
			<div class="label_for_right_box">Відсутній</div>
		</div>
		<div>
			<div class="label_for_left_box">Система звуку</div>
			<div class="label_for_right_box">HD Audio</div>
		</div>
		<div>
			<div class="label_for_left_box">Бездротові комунікації</div>
			<div class="label_for_right_box">Wi-Fi 802.11 b/g/n<br>Bluetooth 4.0</div>
		</div>
		<div>
			<div class="label_for_left_box">Порти і Інтерфейси</div>
			<div class="label_for_right_box">3 порти USB 3.0 (1 з функцією Charger+) / Micro HDMI / комбінований аудіороз`єм</div>
		</div>
		<div>
			<div class="label_for_left_box">Кардрідер</div>
			<div class="label_for_right_box">SD/SDXC</div>
		</div>
		<div>
			<div class="label_for_left_box">Батарея</div>
			<div class="label_for_right_box">Літієво-полімерна, 3-елементна, 45 Вт*год</div>
		</div>
		<div>
			<div class="label_for_left_box">Програмне забезпечення</div>
			<div class="label_for_right_box">Windows 8.1</div>
		</div>
		<div>
			<div class="label_for_left_box">Розміри</div>
			<div class="label_for_right_box">324 x 226 x 12.3 мм</div>
		</div>
		<div>
			<div class="label_for_left_box">Вага</div>
			<div class="label_for_right_box">1.2 кг</div>
		</div>
		<div>
			<div class="label_for_left_box">Додатково</div>
			<div class="label_for_right_box">Веб-камера HD<br>Вбудований мікрофон<br>Стереодинаміки з технологією SonicMaster</div>
		</div>
		<div>
			<div class="label_for_left_box">Комплектація</div>
			<div class="label_for_right_box">Ноутбук<br>Сумка<br>Адаптер живлення<br>Керівництво користувача</div>
		</div>
		<div>
			<div class="label_for_left_box">3G</div>
			<div class="label_for_right_box">Немає</div>
		</div>
		<div>
			<div class="label_for_left_box">Гарантія</div>
			<div class="label_for_right_box">24</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<div>
<?php
define('DB_NAME_FOR_COMMENTS', 'asus_zenbook_ux305fa_fc064h.db');//ім'я бази даних
$_SESSION['const'] = DB_NAME_FOR_COMMENTS;//розміщаємо ім'я бази даних в сесії, щоб її значення потім получити в файлі savepost.php
include "Comment.class.php";//робота з базою даних
$obj = new Comment();
include "comment.php";
?>
</div>