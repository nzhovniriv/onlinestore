<?php
if(isset($_POST['reg'])){
	$login = trim(strip_tags($_POST['login']));
	$password = trim(strip_tags($_POST['password']));
	$repassword = trim(strip_tags($_POST['repassword']));
	$bad = false;//для перевірки коректності введених даних

	/*Получаємо імена користувачів з БД*/
	function getUsers(){
		$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		$sql = "SELECT login FROM registered_users";
		$result = mysqli_query($mysqli, $sql);
		$arr = array();
		/*Получаємо логін користувача для всіх рядків запиту $result*/
		while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
			/*Записуємо дані в масив*/
			$arr[] = $row['login'];
		}
		mysqli_close($mysqli);
		return $arr;
	}

	/*Перевірка полів реєстрації*/
	if(empty($login) || empty($password) || empty($repassword)){
		$_SESSION['error_enter'] = 1;//якщо хоча б одне поле пусте
		$bad = true;
	}else{
		/*Перевірка кількості введених символів в полях*/
		if(strlen($login) < 3 || strlen($login) > 32){
			$_SESSION['error_login'] = 1;//записуємо інформації в змінну $error_login про те, що була допущена помилка в полі login
			$bad = true;
		}
		if(strlen($password) < 6 || strlen($login) > 32){
			$_SESSION['error_password'] = 1;//записуємо інформації в змінну $error_password про те, що була допущена помилка в полі password
			$bad = true;
		}
		/*перевірка на співпадіння паролів*/
		if((md5($password)) != (md5($repassword))){
			$_SESSION['error_repassword'] = 1;//якщо паролі не співпадають
			$bad = true;
		}
		/*перевірка на співпадіння імен користувачів*/
		$arrayUsers = getUsers();
		for($i=0; $i<count($arrayUsers); $i++){
			/*якщо є співпадіння*/
			if($login == $arrayUsers[$i]){
				$_SESSION['error_user'] = 1;
				$bad = true;
			}
		}
	}
	if(!$bad){
		$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		$password = md5($password);
		$sql = "INSERT INTO registered_users(login, password) VALUES('$login', '$password')";
		mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
		header("Location: index.php?id=success_reg");
	}
}
?>