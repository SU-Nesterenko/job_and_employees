<?php
    // Переменные с формы
	$id = $_POST['id'];
	$name = $_POST['name'];
	$salary = $_POST['salary'];		
	$description = $_POST['description'];
	$mode = ($_POST['mode']);    
	
// Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_base = 'db_job'; // Имя БД
    $db_table = "summary"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и закрываем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}    
    
    $result = $mysqli->query("UPDATE " . $db_table . " SET title = '$name', 
		description = '$description', salary = '$salary', mode = '$mode' WHERE id = $id");
	
    
    if ($result == true){
    	echo "Запись с кодом $id была изменена";
    }else{
    	echo "Информация не занесена в базу данных";
    }
?> 