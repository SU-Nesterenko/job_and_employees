

<!DOCTYPE html>

<html lang="ru">
<head>
	<title>JOB</title>
	<meta charset="utf-8">
	 <!-- add bootstrap css file -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
<script type="text/javascript" src='js/main.js'></script>
<script type="text/javascript">

		$(function() {
 
			var dataTable = $('#user_data').DataTable({
				"sDom": '<"top"i>',
				"language": {
					"url":"http://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
				},
				"processing":true,
				"serverSide":true,
"bInfo": false,
"bFilter": false,

				"order":[],
				"ajax":{
					data: function (data) {
						data.name_search = $("#name_search").val();
						data.sal_from_search = $("#sal_from_search").val();
						data.sal_to_search = $("#sal_to_search").val();
					},
					url:"/rest/vacancy_main",
					type:"POST",
				},
				"columnDefs":[
					{
						"targets":[0,1, 2], // Столбцы, по которым не нужна сортировка
						"orderable":false,
					},
				],
			});
			
			var dataTable = $('#rezume_data').DataTable({
				"sDom": '<"top"i>',
				"language": {
					"url":"http://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
				},
				"processing":true,
				"serverSide":true,
"bInfo": false,
"bFilter": false,

				"order":[],
				"ajax":{
					data: function (data) {
						data.name_search = $("#name_search").val();
						data.sal_from_search = $("#sal_from_search").val();
						data.sal_to_search = $("#sal_to_search").val();
					},
					url:"/rest/rezume_main",
					type:"POST",
				},
				"columnDefs":[
					{
						"targets":[0,1, 2], // Столбцы, по которым не нужна сортировка
						"orderable":false,
					},
				],
			});
			
			var dataTable = $('#obyvlenie_data').DataTable({
				"sDom": '<"top"i>',
				"language": {
					"url":"http://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
				},
				"processing":true,
				"serverSide":true,
"bInfo": false,
"bFilter": false,

				"order":[],
				"ajax":{
					data: function (data) {
						data.name_search = $("#name_search").val();
						data.sal_from_search = $("#sal_from_search").val();
						data.sal_to_search = $("#sal_to_search").val();
					},
					url:"/rest/obyvlenie_main",
					type:"POST",
				},
				"columnDefs":[
					{
						"targets":[0,1, 2], // Столбцы, по которым не нужна сортировка
						"orderable":false,
					},
				],
			});
			});
		
			</script>
</head>
<body>
  <!-- navbar -->


  <nav class="navbar navbar-expand-lg fixed-top" >
	  <a class="navbar-brand" href="#">Главная</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-4">
			  <li class="nav-item">
				  <a class="nav-link" href="#" id="home" data-value="IT">Вакансии</a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="#" data-value="mag">Резюме</a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="#" data-value="rad">Обявления</a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="auth_user.php" data-value="tel">Вход</a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="reg_user.php" data-value="red">Регистрация</a>
			  </li>
		  </ul>
	  </div>
  </nav>



<!-- header -->
<header class="header ">
  <div class="overlay"></div>
   <div class="container">
   	  <div class="description ">
  	<h1>
  		Job_And_Employees
  		<!--<p>
  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  		<button class="btn btn-outline-secondary btn-lg">See more</button>-->
  	</h1>
  </div>
   </div>
  
</header>




<!-- Posts section -->
<div class="blog" id="IT">
	<div class="container">
	<a class="nav-link" href="list.php" id="home"><h1 class="left">Вакансии</h1></a>
	
		<div class="row">
		
			<div class="col-md-12 col-lg-12 col-sm-4">
				<table id="user_data" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="10%">Наименование</th>
			<th width="10%">Зарплата</th>
			<th width="10%">Описание</th>
			<th width="10%">Дата</th>
			
		</tr>
		</thead>
	</table>
</div>
			</div>
			
		</div>
	</div>
</div>

<div class="blog" id="mag">
	<div class="container">
	<a class="nav-link" href="allresume.php" id="home"><h1 class="left">Резюме</h1></a>
	
		<div class="row">
		
			<div class="col-md-12 col-lg-12 col-sm-12">
				<table id="rezume_data" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="10%">ФИО</th>
			<th width="10%">Должность</th>
			<th width="10%">Дата</th>
			<th width="10%">Зарплата</th>
			<th width="10%">Телефон</th>
			
		</tr>
		</thead>
	</table>
</div>
			</div>
			
		</div>
	</div>
	
	<div class="blog" id="rad">
	<div class="container">
	<h1 class="left">Объявления</h1>
		<div class="row">
		
			<div class="col-md-12 col-lg-12 col-sm-12">
				<table id="obyvlenie_data" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="10%">Наименование</th>
			<th width="10%">Описание</th>
			<th width="10%">Дата</th>
			<th width="10%">Телефон</th>
			
		</tr>
		</thead>
	</table>
</div>




<!-- Contact form -->

<!-- add Javasscript file from js file -->




</body>
</html>