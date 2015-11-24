<?php
/*Провірка наявності логіна*/
function users($login){
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
	$user = false;//змінна щоб відслідкувати чи є такий користувач
	$arrayUsers = $arr;
	for($i=0; $i<count($arrayUsers); $i++){
		/*якщо є співпадіння*/
		if($login === $arrayUsers[$i]){
			$user = true;
		}
	}
	return $user;
}

/*Перевірка введених даних*/
function checkUser($login, $password){
	if($login == "" || $password == "") return false;//початкова провірка полів
	$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$result_set = mysqli_query($mysqli, "SELECT password FROM registered_users WHERE login = '$login'");
	$user = mysqli_fetch_assoc($result_set);//получаємо результат запиту у вигляді масиву
	$real_password = $user['password'];//пароль з БД
	mysqli_close($mysqli);
	return $real_password == $password;//якщо паролі співпадають, то вернеться true
}
/*Приймаємо дані*/
if(isset($_POST['auth'])){
	/*Получаємо дані*/
	$log = $_POST['log'];
	$pass = md5($_POST['pass']);
	if(empty($log) || empty($_POST['pass'])){
		$_SESSION['empty_auth'] = 1;
	}else{
		if(users($log) && checkUser($log, $pass)){
			//якщо введені правильні дані записуємо і-ю
			$_SESSION['login'] = $log;
			$_SESSION['password'] = $pass;
		}else{
			//якщо користувач помилився
			$_SESSION['error_auth'] = 1;
		}
	}
}
?>
