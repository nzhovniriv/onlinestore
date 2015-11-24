<?php
/*ім'я користувача беремо з $_SESSION['login']*/
if(isset($_SESSION['login'])){
	$name = $_SESSION['login'];//ім'я користувача
}else{
	$name = '';
}
/*Показуємо необхідний блок на сторінці в залежності від того, чи авторизований користувач*/
if(empty($name)){
	$class_hide_form = 'class_hide';
}else{
	$class_hide_comment = 'class_hide';
}
?>
<div align="center" style="margin-top:20px;" class="<?php echo $class_hide_comment?>">
	<div class="comment"><span>Тільки зареєстровані та авторизовані користувачі можуть залишати коментарі.</span></div>
</div>
<div class="<?php echo $class_hide_form?>" style="margin-top:20px;">
	<form action="savepost.php" method="post">
		<div><b>Коментар:</b></div>
		<div>
			<?php
			if(isset($_SESSION['errMsg'])){
			echo "<span style='color:red;'>".$_SESSION['errMsg']."</span>";//якщо поле не заповнене, виводимо помилку
			unset($_SESSION['errMsg']);
			}
			?>
		</div>
		<textarea name="msg" cols="50" rows="5"></textarea>
		<p><input type="submit" name="com" value="Добавити"></p>
	</form>
</div>
<div>
<?php
include "getData.php";//файл, де відбувається вивід даних
unset($obj);//закриваємо з'єднання з базою даних
?>
</div>


