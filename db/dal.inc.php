<?php require_once("$_SERVER[DOCUMENT_ROOT]/../db/common.dal.inc.php");

function DBCheckUser($email){
    $a=_DBGetQuery("SELECT COUNT(*) As N FROM users WHERE Login='$email'");
    return $a["N"];
}

function DBAddUser($username,$email,$password,$roleid) {
    _DBQuery("
	INSERT INTO users(Name,Login,Password,RoleID) 
	VALUES('$username','$email','$password','$roleid')");
}


//CRUD - Create Read Update Delete
//Создание нового пользователя (Create)
function DBCreateVacancy($Name,$Cena,$Opisanie,$Rabota) {
    //Предотвращение SQL-инъекций
    $Name=_DBEscString($Name);
    $Opisanie=_DBEscString($Opisanie);
    $Rabota=(int)($Rabota);
    $Cena=(int)$Cena;

    //Выполнение запроса к БД
    _DBQuery("
		INSERT INTO vacancy(Nazvanie,salary,duty,Opisanie)
		VALUES ('$Name','$Cena','$Rabota','$Opisanie')
	");
}
function DBCreateAdvertising($Name,$date,$Opisanie,$tel) {
    //Предотвращение SQL-инъекций
    $Name=_DBEscString($Name);
    $Opisanie=_DBEscString($Opisanie);
   
    

    //Выполнение запроса к БД
    _DBQuery("
		INSERT INTO advertising(Nazvanie,Opisanie,Tel,Data)
		VALUES ('$Name','$Opisanie','$tel','$date')
	");
}

//Получение одного пользователя (Read)
function DBGetVacancyOne($id) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;
    //Выполнение запроса
    return _DBGetQuery("SELECT * FROM vacancy WHERE ID=$id");
}
function DBGetReadAdvertisingOne($id) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;
    //Выполнение запроса
    return _DBGetQuery("SELECT * FROM advertising WHERE ID=$id");
}
function DBFetchUsers() {
    return _DBFetchQuery("SELECT * FROM users");
}
function DBFetchVacancyAll() {
    return _DBFetchQuery("SELECT * FROM vacancy");
}
function DBFetchRezumeAll() {
    return _DBFetchQuery("SELECT * FROM resume");
}
function DBFetchObyvlenieAll() {
    return _DBFetchQuery("SELECT * FROM advertising");
}
//Получение списка пользователей (Read)
function DBFetchVacancy($search_string, $sort, $dir, $s, $l, $sal_from = null, $sal_to = null) {

    //Предотвращение SQL-инъекций
    $search_string=_DBEscString($search_string);
    $sort=(int)$sort;
    $dir=_DBEscString($dir);
    $s=(int)$s;
    $l=(int)$l;

    $sal_from=(int)$sal_from;
    $sal_to=(int)$sal_to;

    //Формирование запроса
    $limit="LIMIT $s,$l";

    $where_like="";
    if(trim($search_string)!="") {

        $search_string=_DBEscString($search_string);
        $where_like="WHERE Nazvanie LIKE \"%$search_string%\"";
    }

    if ($sal_from && $sal_to){
        if ($where_like == ""){
            $where_like .=" WHERE salary BETWEEN $sal_from AND $sal_to";
        }
        if ($where_like != ""){
            $where_like .=" AND salary BETWEEN $sal_from AND $sal_to";
        }
    }
    elseif ($sal_from){
        if ($where_like == ""){
            $where_like .=" WHERE salary >= $sal_from";
        }
        if ($where_like != ""){
            $where_like .=" AND salary >= $sal_from";
        }
    }
    elseif ($sal_to){
        if ($where_like == ""){
            $where_like .=" WHERE salary <= $sal_to";
        }
        if ($where_like != ""){
            $where_like .=" AND salary <= $sal_to";
        }
    }

    $order="";
    if(trim($sort)!="" && $dir!="")
        $order="ORDER BY ".((int)$sort+2)." $dir";

    //Выполнение запроса
    return _DBFetchQuery("SELECT * FROM vacancy $where_like $order $limit");
}

//Подсчёт общего числа пользователей в базе (Read)
function DBCountAllVacancy() {
    return _DBRowsCount(_DBQuery("SELECT * from vacancy"));
}
function DBFetchAdvertisingAll($search_string, $sort, $dir, $s, $l, $sal_from = null, $sal_to = null) {

    //Предотвращение SQL-инъекций
    $search_string=_DBEscString($search_string);
    $sort=(int)$sort;
    $dir=_DBEscString($dir);
    $s=(int)$s;
    $l=(int)$l;

    $sal_from=(int)$sal_from;
    $sal_to=(int)$sal_to;

    //Формирование запроса
    $limit="LIMIT $s,$l";

    $where_like="";
    if(trim($search_string)!="") {

        $search_string=_DBEscString($search_string);
        $where_like="WHERE Nazvanie LIKE \"%$search_string%\"";
    }

    /*if ($sal_from && $sal_to){
        if ($where_like == ""){
            $where_like .=" WHERE salary BETWEEN $sal_from AND $sal_to";
        }
        if ($where_like != ""){
            $where_like .=" AND salary BETWEEN $sal_from AND $sal_to";
        }
    }
    elseif ($sal_from){
        if ($where_like == ""){
            $where_like .=" WHERE salary >= $sal_from";
        }
        if ($where_like != ""){
            $where_like .=" AND salary >= $sal_from";
        }
    }
    elseif ($sal_to){
        if ($where_like == ""){
            $where_like .=" WHERE salary <= $sal_to";
        }
        if ($where_like != ""){
            $where_like .=" AND salary <= $sal_to";
        }
    }*/

    $order="";
    if(trim($sort)!="" && $dir!="")
        $order="ORDER BY ".((int)$sort+2)." $dir";

    //Выполнение запроса
    return _DBFetchQuery("SELECT * FROM advertising $where_like $order $limit");
}

//Подсчёт общего числа пользователей в базе (Read)
function DBCountAdvertisingAll() {
    return _DBRowsCount(_DBQuery("SELECT * from advertising"));
}
//Редактирование элемента (Update)
function DBUpdateVacancy($id,$Name,$Cena,$Opisanie,$Rabota) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;
    $Name=_DBEscString($Name);
    $Opisanie=_DBEscString($Opisanie);
    $Rabota=(int)($Rabota);
    $Cena=(int)$Cena;

    //Выполнение запроса
    _DBQuery("
		UPDATE vacancy 
		SET	Nazvanie='$Name',
		salary='$Cena',
		duty='$Rabota',
		Opisanie='$Opisanie'
		WHERE 
			ID=$id
	");
}
function DBUpdateAdvertising($id,$Name,$date,$Opisanie,$tel) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;
    $Name=_DBEscString($Name);
    $Opisanie=_DBEscString($Opisanie);
   

    //Выполнение запроса
    _DBQuery("
		UPDATE advertising 
		SET	Nazvanie='$Name',
		tel='$tel',
		Data='$date',
		Opisanie='$Opisanie'
		WHERE 
			ID=$id
	");
}
//Удаление элемента (Delete)
function DBDeleteVacancy($id) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;

    //Выполнение запроса
    _DBQuery("DELETE FROM vacancy WHERE id=$id");
}

//Удаление элемента (Delete)
function DBDeleteUser($id) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;

    //Выполнение запроса
    _DBQuery("DELETE FROM users WHERE id=$id");
}
function DBDeleteAdvertising($id) {
    //Предотвращение SQL-инъекций
    $id=(int)$id;

    //Выполнение запроса
    _DBQuery("DELETE FROM advertising WHERE id=$id");
}

function switchUser($id){

    //Предотвращение SQL-инъекций
    $id=(int)$id;

    $res = _DBQuery("
        SELECT isActive
        FROM users
        WHERE id =$id"
    );

    $followingdata = $res->fetch_array(MYSQLI_ASSOC);

    //print_r($followingdata["isActive"]);
    //return;

    if ($followingdata["isActive"] == 0){
        _DBQuery("UPDATE users SET isActive = 1 WHERE ID = $id");
    }
    else{
        _DBQuery("UPDATE users SET isActive = 0 WHERE ID = $id");
    }

    //Выполнение запроса
}

