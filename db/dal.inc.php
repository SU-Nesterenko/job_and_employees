<?php require_once("$_SERVER[DOCUMENT_ROOT]/../db/common.dal.inc.php");

//CRUD - Create Read Update Delete
//Создание нового пользователя (Create)
function DBCreateUser($Name,$Email,$Age) {
	//Предотвращение SQL-инъекций
	$Name=_DBEscString($Name);
	$Email=_DBEscString($Email);
	$Age=(int)$Age;
	
	//Выполнение запроса к БД
	_DBQuery("
		INSERT INTO Users(Name,Email,Age)
		VALUES ('$Name','$Email','$Age')
	");
}

//Получение одного пользователя (Read)
function DBGetUser($id) {
	//Предотвращение SQL-инъекций
	$id=(int)$id;
	//Выполнение запроса
	return _DBGetQuery("SELECT * FROM users WHERE ID=$id");
}

//Получение списка пользователей (Read)
function DBFetchUser($search_string,$sort,$dir,$s,$l) {
	//Предотвращение SQL-инъекций
	$search_string=_DBEscString($search_string);
	$sort=(int)$sort;
	$dir=_DBEscString($dir);
	$s=(int)$s;
	$l=(int)$l;	
	
	//Формирование запроса
	$limit="LIMIT $s,$l";
	
	$where_like="";
	if(trim($search_string)!="") {
		$search_string=_DBEscString($search_string);
		$where_like="WHERE Name LIKE \"%$search_string%\"";
	}

	$order="";
	if(trim($sort)!="" && $dir!="") 
		$order="ORDER BY ".((int)$sort+2)." $dir";	
	
	//Выполнение запроса
	return _DBFetchQuery("SELECT * FROM users $where_like $order $limit");
}

//Подсчёт общего числа пользователей в базе (Read)
function DBCountAllUsers() { 
	return _DBRowsCount(_DBQuery("SELECT * from users"));
}

//Редактирование элемента (Update)
function DBUpdateUser($id,$Name,$Email,$Age) {
	//Предотвращение SQL-инъекций
	$id=(int)$id;
	$Name=_DBEscString($Name);
	$Email=_DBEscString($Email);
	$Age=(int)$Age;
	
	//Выполнение запроса	
	_DBQuery("
		UPDATE Users 
		SET	Name='$Name',
			Email='$Email',
			Age='$Age'
		WHERE 
			ID=$id
	");
}

//Удаление элемента (Delete)
function DBDeleteUser($id) {
	//Предотвращение SQL-инъекций
	$id=(int)$id;
	
	//Выполнение запроса
	_DBQuery("DELETE FROM Users WHERE id=$id");
}

