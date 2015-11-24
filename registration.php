<div align="center">
	<h2 style="text-align:center;margin:20px 0;">Реєстрація</h2>
	<form action="" method="post" id="reg">
		<?php
			if($_SESSION['error_enter'] == 1) echo "<p><span style='color:red;'>Заповніть всі поля</span></p>";
			if($_SESSION['error_login'] == 1) echo "<p><span style='color:red;'>Некоректний логін(мінімум 3 символи)</span></p>";
			if($_SESSION['error_password'] == 1) echo "<p><span style='color:red;'>Некоректний пароль(мінімум 6 символів)</span></p>";
			if($_SESSION['error_repassword'] == 1) echo "<p><span style='color:red;'>Паролі не співпадають</span></p>";
			if($_SESSION['error_user'] == 1) echo "<p><span style='color:red;'>Користувач з таким іменем існує</span></p>";
			
			/*видаляємо дані перед кожним вводом і-ї в полях реєстрації*/
			if(isset($_SESSION['error_enter'])) unset($_SESSION['error_enter']);
			if(isset($_SESSION['error_login'])) unset($_SESSION['error_login']);
			if(isset($_SESSION['error_password'])) unset($_SESSION['error_password']);
			if(isset($_SESSION['error_repassword'])) unset($_SESSION['error_repassword']);
			if(isset($_SESSION['error_user'])) unset($_SESSION['error_user']);
		?>
		<div class="form-item">
			<span class="label">Логін:</span>
			<span class="field"><input type="text" name="login" class="form-text"></span>
		</div>
		<div class="form-item">
			<span class="label">Пароль:</span>
			<span class="field"><input type="password" name="password" class="form-text"></span>
		</div>
		<div class="form-item">
			<span class="label">Повторіть пароль:</span>
			<span class="field"><input type="password" name="repassword" class="form-text"></span>
		</div>
	<p style="text-align:center;margin:20px;"><input type="submit" name="reg" value="Зареєструватися"></p>
	</form>
</div>