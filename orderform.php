<div align="center">
	<h2 style="text-align:center;margin:20px 0;">Оформлення заказу</h2>
	<form action="saveorder.php" method="post" id="reg">
		<?php
			if($_SESSION['error_enter'] == 1) echo "<p><span style='color:red;'>Заповніть всі поля</span></p>";
			/*видаляємо дані перед кожним вводом і-ї в полях реєстрації*/
			if(isset($_SESSION['error_enter'])) unset($_SESSION['error_enter']);
		?>
		<div class="form-item">
			<span class="label">Ім'я покупця:</span>
			<span class="field"><input type="text" name="customer" class="form-text"></span>
		</div>
		<div class="form-item">
			<span class="label">E-mail:</span>
			<span class="field"><input type="text" name="email" class="form-text"></span>
		</div>
		<div class="form-item">
			<span class="label">Телефон:</span>
			<span class="field"><input type="text" name="phone" class="form-text"></span>
		</div>
		<div class="form-item">
			<span class="label">Адреса доставки:</span>
			<span class="field"><input type="text" name="address" class="form-text"></span>
		</div>
	<p style="text-align:center;margin:20px;"><input type="submit" name="buy" value="Оформити"></p>
	</form>
</div>