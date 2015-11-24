<?php
class Comment{
	protected $_db;//тут буде наш об'єкт з'єднання з базою даних
	function __construct(){
		if(!file_exists('comments/'.DB_NAME_FOR_COMMENTS)){
			$this->_db = new SQLite3('comments/'.DB_NAME_FOR_COMMENTS);//якщо його нема то він його створить
			/*Створюємо таблицю*/
			$sql = "CREATE TABLE comments(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, msg TEXT, ip TEXT, datetime INTEGER)";
			$this->_db->query($sql);
		}else{
			$this->_db = new SQLite3('comments/'.DB_NAME_FOR_COMMENTS);//якщо є, то він його відкриває
		}
	}
	/*Деструктор, у якому виконується закриття з'єднання з базою даних*/
	function __destruct(){
		unset($this->_db);
	}
	
	/*для того щоб відфільтрувати дані, що прийшли методом POST*/
	function clearData($data){
		$data = stripslashes($data);//видаляє екранування символів, повертає рядок з вирізаними зворотніми слешами
		$data = strip_tags($data);//видаляє HTML і PHP-теги з рядка
		$data = trim($data);//видаляє пробіли (або інші символи) з початку і кінця рядка
		$data = SQLite3::escapeString ($data);//екранує спецсимволи в рядку для використання в запиті
		return $data;
	}
	/*Додавання нового запису в базу даних*/
	function savePost($name, $msg){
		$ip = $_SERVER["REMOTE_ADDR"];
		$dt = time();
		$sql = "INSERT INTO comments(name, msg, ip, datetime) VALUES('$name', '$msg', '$ip', $dt)";
		$res = $this->_db->query($sql);
	}
	/*Вибірка всіх записів*/
	function getAll(){
		$sql = "SELECT id, name, msg, ip, datetime FROM comments ORDER BY id DESC";
		$result = $this->_db->query($sql);//виконує запит до бази даних
		$arr = array();
		while($row = $result->fetchArray(SQLITE3_ASSOC)){
			$arr[] = $row; 
		}
		return $arr;
	}
	/*Видалення запису з бази даних*/
	function deleteComment($id_comment){
		$sql = "DELETE FROM comments WHERE id=$id_comment";
		$this->_db->query($sql);
	}
}
?>