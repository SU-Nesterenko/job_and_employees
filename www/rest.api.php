<? 
 require_once("$_SERVER[DOCUMENT_ROOT]/../includes/flight/Flight.php");
 require_once("$_SERVER[DOCUMENT_ROOT]/../db/dal.inc.php");
  
 function CreateUser() {
	 DBCreateUser(
		Flight::request()->data["Name"],
		Flight::request()->data["Email"],
		Flight::request()->data["Age"]
	);
 }
 Flight::route('PUT /rest/user',"CreateUser");
 
 function ReadUser($id) {
	Flight::json(DBGetUser($id));
 }
 Flight::route('GET /rest/user\?id=@id',"ReadUser");
 
 function ReadUsers() {
	$data=Array();

	while($row=DBFetchUser(
		$_POST["search"]["value"],
		$_POST['order']['0']['column'],
		$_POST['order']['0']['dir'],
		$_POST['start'],$_POST["length"])) 
	{
		$data[]=Array($row["Name"],$row["Email"],$row["Age"],
		'<button type="button" name="update" id="'.$row["ID"].'" class="btn btn-warning btn-xs update">Редактировать</button>',
		'<button type="button" name="delete" id="'.$row["ID"].'" class="btn btn-danger btn-xs delete">Удалить</button>');	
	}


	//Отправка данных клиенту в формате JSON (JavaScript Object Notation)
	Flight::json(Array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	count($data),
			"recordsFiltered"	=>	DBCountAllUsers(),
			"data"				=>	$data
	));
	
 }
 Flight::route('POST /rest/users',"ReadUsers");
 
 function UpdateUser() {
	 DBUpdateUser(
		Flight::request()->data["ID"],
		Flight::request()->data["Name"],
		Flight::request()->data["Email"],
		Flight::request()->data["Age"]
	);
 }
 Flight::route('PATCH /rest/user',"UpdateUser");
 
 function DeleteUser($id) {
	 DBDeleteUser($id);
 }
 Flight::route('DELETE /rest/user\?id=@id',"DeleteUser"); 

 Flight::start();
