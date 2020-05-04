<? 
 require_once("$_SERVER[DOCUMENT_ROOT]/../includes/flight/Flight.php");
 require_once("$_SERVER[DOCUMENT_ROOT]/../db/dal.inc.php");
  
 function CreateVacancy() {
	 DBCreateVacancy(
		Flight::request()->data["Naizvanie"],
		Flight::request()->data["Cena"],
		Flight::request()->data["Opisanie"],
		Flight::request()->data["rabota"]
	);
 }
 Flight::route('PUT /rest/vacancy',"CreateVacancy");
 
 function ReadVacancyOne($id) {
	Flight::json(DBGetVacancyOne($id));
 }
 Flight::route('GET /rest/vacancy_one\?id=@id',"ReadVacancyOne");

/*
function Login() {
    Flight::json(tryLogin(Flight::request()->data));
}
Flight::route('POST /rest/login',"Login");
*/


function switchUserActivation($id){
    switchUser($id);
}
Flight::route('GET /rest/switchUserActivation\?id=@id',"switchUserActivation");

function getUsers(){
    $data=Array();
    $btn = null;

    while($row=DBFetchUsers()){

        if ($row["isActive"]){
            $btn = '<button type="button" name="block" id="'.$row["ID"].'" class="btn btn-warning btn-xs update">Заблокировать</button>';
        }
        else{
            $btn = '<button type="button" name="unblock" id="'.$row["ID"].'" class="btn btn-warning btn-xs update">Разблокировать</button>';
        }

        $data[]=Array(
            $row["ID"],
            $row["Name"],
            $row["Login"],
            $btn,
            '<button type="button" name="delete" id="'.$row["ID"].'" class="btn btn-danger btn-xs delete">Удалить</button>');
    }

    //Отправка данных клиенту в формате JSON (JavaScript Object Notation)
    Flight::json(Array(
        "data" => $data
    ));

}
Flight::route('GET /rest/getUsers',"getUsers");


 
 function ReadJob_Openings() {
	$data=Array();

	while($row=DBFetchVacancy(
		$_POST["name_search"],
		$_POST['order']['0']['column'],
		$_POST['order']['0']['dir'],
		$_POST['start'],
        $_POST["length"],
        $_POST["sal_from_search"],
        $_POST["sal_to_search"]
    )){
		$data[]=Array($row["Nazvanie"], $row["salary"],
		'<button type="button" name="update" id="'.$row["ID"].'" class="btn btn-warning btn-xs update">Редактировать</button>',
		'<button type="button" name="delete" id="'.$row["ID"].'" class="btn btn-danger btn-xs delete">Удалить</button>');	
	}

	//Отправка данных клиенту в формате JSON (JavaScript Object Notation)
	Flight::json(Array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	count($data),
			"recordsFiltered"	=>	DBCountAllVacancy(),
			"data"				=>	$data
	));
	
 }
 Flight::route('POST /rest/job_openings',"ReadJob_Openings");
 
 function UpdateVacancy() {
	 DBUpdateVacancy(
		Flight::request()->data["ID"],
		Flight::request()->data["Naizvanie"],
		Flight::request()->data["Cena"],
		Flight::request()->data["Opisanie"],
		Flight::request()->data["rabota"]
	);
 }
 Flight::route('PATCH /rest/vacancy',"UpdateVacancy");
 
 function DeleteVacancy($id) {
	 DBDeleteVacancy($id);
 }
 Flight::route('DELETE /rest/vacancy\?id=@id',"DeleteVacancy");

function DeleteUser($id) {
    DBDeleteUser($id);
}
Flight::route('DELETE /rest/user\?id=@id',"DeleteUser");

Flight::start();
