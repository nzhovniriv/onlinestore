<?php
header("Content-Type: text/html;charset=utf-8");
header("Cache-Control: no-store");

/*для виводу інформації про користувача(online, помилки в полях login і password при реєстрації чи авторизації)*/
session_start();

include "lib/lib.inc.php";//підключення бібліотеки

include 'constants.php';//костанти для підключення до сервева MySQL
include 'handler_reg_form.php';//реєстрація
include "handler_auth.php";//авторизація

include 'main_variable.php';//і-я на головній сторінці
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online store Deshevshe</title>
<link href="animation.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="footer-margin.css" rel="stylesheet" type="text/css">
<link href="columns.css" rel="stylesheet" type="text/css">
<link href="menu.css" rel="stylesheet" type="text/css">
<link href="style(slide-show).css" rel="stylesheet" type="text/css">
<link href="form_style.css" rel="stylesheet" type="text/css">
<link href="lightbox.css" rel="stylesheet" type="text/css">
<link href="style_for_other_pages.css" rel="stylesheet" type="text/css">
<link href="style_comment.css" rel="stylesheet" type="text/css">
<link href="style_goods.css" rel="stylesheet" type="text/css">

<script src="jQuery(v-1-11-3).js" type="text/javascript"></script>
<script src="slide-show.js" type="text/javascript"></script>
<script src="animation.js" type="text/javascript"></script>
<script src="json_example.js" type="text/javascript"></script>
<script src="lightbox.js" type="text/javascript"></script>

</head>
<body>
<div id="container">
	<div id="main">
		<div id="all">
			<div>
				<div id="img">
					<ul>
						<li><img src="img/notebook1.jpg"></li>
						<li><img src="img/notebook2.jpg"></li>
						<li><img src="img/notebook3.jpg"></li>
						<li><img src="img/notebook4.jpg"></li>
						<li><img src="img/notebook5.jpg"></li>
					</ul>
				</div>
				<div>
					<ul id="hormenu">
						<li class="border">
							<a class="button" href="index.php" title="Головна сторінка">Головна сторінка</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
						<li class="border">
							<a class="button" href="index.php?id=goods" title="Товари">Товари</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
						<li class="border">
							<a class="button" href="index.php?id=delivery" title="Доставка і оплата">Доставка і оплата</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
						<li class="border">
							<a class="button" href="index.php?id=registration" title="Реєстрація">Реєстрація</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
						<li class="border">
							<a class="button" href="index.php?id=feedback" title="Зворотній зв'язок">Зворотній зв'язок</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
						<li class="border">
							<a class="button" href="index.php?id=contacts" title="Контакти">Контакти</a>
							<span class="png lt"></span>
							<span class="png lb"></span>
							<span class="png rt"></span>
							<span class="png rb"></span>
						</li>
					</ul>
				</div>
			</div>
			<div id="content" style="line-height:18px;">
				<?php
				error_reporting(E_ALL & ~E_NOTICE);//виставляємо чутливість інтерпретатора(всі повідомлення про помилки за винятком заміток)
				$id = trim($_GET['id']);//видаляємо можливі пробіли
				/*Якщо зроблений пошуковий запит, то виводимо результат пошуку, в іншому випадку відслідковуємо можливе значення $id*/
				if(isset($_GET['search'])){
					if(($_GET['search'] != 'search...') && (!empty($_GET['search'])) && (preg_match("/[a-zA-Z0-9а-яА-Я]/", "$_GET[search]"))){
						
						include "lib/function_for_search.php";
						
						$results = searchGoods(trim(htmlspecialchars($_GET['search'])));
						if(count($results) != 0){
							for($i = 0; $i < count($results); $i++){
								include "search_item.php";
								if($i == count($result) - 1) echo "<div id='clear_for_goods'></div>";//коли останній блок виведеться, добавляємо ще один з відміною для обтікання 
							}
						}else{
							echo "<h3 style='text-align:center;'>По вашому запиту нічого не знайдено!</h3>";
						}
					}else{
						echo "<h3 style='text-align:center;'>Незаданий або некоректний пошуковий запит!</h3>";
					}
				}else{
					switch($id)
					{
						case "delivery":
							include 'delivery.php'; break;
						case "contacts":
							include 'contacts.php'; break;
						case "goods":
							include 'goods.php'; break;
						case "registration":
							include 'registration.php'; break;
						case "feedback":
							include 'feedback.php'; break;
						case "success_reg":
							include 'success_reg.php'; break;
						case "basket":
							include 'basket.php'; break;
						case "orderform":
							include 'orderform.php'; break;
						case "success_order":
							include 'success_order.php'; break;
						case "orders":
							include 'orders.php'; break;
						case "success_request":
							include 'success_request.php'; break;

						
						/*Товарні позиції*/
						case "hp_probook_450_l8a66es":
							include 'pages/hp_probook_450_l8a66es/hp_probook_450_l8a66es.php'; break;
						case "hp_probook_470_f7y26es":
							include 'pages/hp_probook_470_f7y26es/hp_probook_470_f7y26es.php'; break;
						case "hp_pavilion_17_e183sr_g5e26ea":
							include 'pages/hp_pavilion_17_e183sr_g5e26ea/hp_pavilion_17_e183sr_g5e26ea.php'; break;
						case "hp_250_g3_j4t60ea":
							include 'pages/hp_250_g3_j4t60ea/hp_250_g3_j4t60ea.php'; break;
						case "asus_x751ma-ty117d":
							include 'pages/asus_x751ma-ty117d/asus_x751ma-ty117d.php'; break;
						case "asus_x751ldv_ty163d":
							include 'pages/asus_x751ldv_ty163d/asus_x751ldv_ty163d.php'; break;
						case "asus_zenbook_ux305fa_fc064h":
							include 'pages/asus_zenbook_ux305fa_fc064h/asus_zenbook_ux305fa_fc064h.php'; break;
						case "asus_x555lb-xo141d":
							include 'pages/asus_x555lb-xo141d/asus_x555lb-xo141d.php'; break;
						case "lenovo_80k6008eua":
							include 'pages/lenovo_80k6008eua/lenovo_80k6008eua.php'; break;
						case "lenovo_80e300egua":
							include 'pages/lenovo_80e300egua/lenovo_80e300egua.php'; break;
						case "lenovo_g50_30_80g001t3ua":
							include 'pages/lenovo_g50_30_80g001t3ua/lenovo_g50_30_80g001t3ua.php'; break;
						case "lenovo_g7080_80fg003pua":
							include 'pages/lenovo_g7080_80fg003pua/lenovo_g7080_80fg003pua.php'; break;
						
						default:
							echo $str;//з підключаємого файлу main_variable.php
					}
				}
				?>
			</div> 
			<div id="sidebar">
				<?php
					/*Робимо доступним посилання 'Отримані закази' тільки для користувача admin*/
					if($_SESSION['login'] === 'admin'){
						$class_hide_basket = 'class_hide';
					}else{
						$class_hide_orders = 'class_hide';
					}
				?>
				<div align="center" style="margin:10px 0px;" class="<?php echo $class_hide_basket?>">
					<p>Товарів в <a href="index.php?id=basket" title="Корзина">корзині</a>: <?php echo $count?></p>
				</div>
				<div align="center" style="margin:10px 0px;" class="<?php echo $class_hide_orders?>">
					<p><a href="index.php?id=orders" title="Закази">Отримані закази</a></p>
				</div>
				<div>
					<?php
						/*Перевіряємо чи правильно введені дані користувача*/
						if(checkUser($_SESSION['login'], $_SESSION['password'])){
							echo "<p style='text-align:center;'>Ви зайшли як: <b>".$_SESSION['login']."</b></p>";
							echo "<p style='text-align:center;'><a href='logout.php' title='Вихід'>Вихід</a></p>";
						}else{
							echo "<p style='text-align:center;font-weight:700;margin:25px 0 0;'>Вхід на сайт</p>";
							if($_SESSION['empty_auth'] == 1){
								echo "<p style='color:red; text-align:center;'>Заповніть всі поля</p>";
								unset($_SESSION['empty_auth']);//видаляємо дані
							}
							if($_SESSION['error_auth'] == 1){
								echo "<p style='color:red; text-align:center;'>Невірні ім'я користувача і/або пароль</p>";
								unset($_SESSION['error_auth']);//видаляємо дані
							}
							include 'form.php';
						}
					?>
				</div>
				<div>
					<p style="text-align:center;font-weight:700;margin:25px 0 10px;">Пошук на сайті</p>
					<form action="" method="get">
						<p style="text-align:center;margin:0;">
							<input type="text" name="search" value="search..." onfocus="if(this.value=='search...') this.value='';" onblur="if(this.value=='') this.value='search...';" style="width:150px; color: rgb(255, 255, 255); border: 2px solid rgb(100, 117, 134); padding: 2px 2px 2px 25px; background: url(img/search.png) no-repeat 2% 50% rgb(68, 85, 102);">
							<input type="submit" name="button_search" value="Пошук" style="padding:2px 4px;border:1px solid black;">
						</p>
					</form>
				</div>
				<div style="text-align:center;">
					<p style="font-weight:700;margin:25px 0 10px;">Виберіть сайт виробника</p>
					<form name="mySelect">
							<select name="selURL" style="width:160px;"></select>
							<input type="button" value="Перейти" onclick="goToURL()">
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="footer" style="text-align:center;">
		<h4>&copy; <?php date_default_timezone_set("Europe/Kiev"); echo date('Y')?>. Online store Deshevshe. This site was made by Nazariy Zhovniriv.</h4>
	</div>
</div>
<div id="lightbox"></div><!--блок для тіні на сторінці "Контакти"-->
<div id="photo_for_lightbox" onclick="hidePhoto();"></div><!--блок для того щоб розмістити картинку по середині блоку lightbox на сторінці "Контакти"-->
<script src="select_example.js" type="text/javascript"></script>

</body> 
</html>