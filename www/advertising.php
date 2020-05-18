<?php

    require_once("../auth/auth.inc.php");

    if(!user_is_advertiser() || !user_is_admin()) exit();
?>

<!DOCTYPE html>
<html>
<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

	<script type="text/javascript">

		$(function() {

			var dataTable = $('#user_data').DataTable({
				"sDom": '<"top"i>rt<"bottom"lp><"clear">',
				"language": {
					"url":"http://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
				},
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
					data: function (data) {
						data.name_search = $("#name_search").val();
						data.sal_from_search = $("#sal_from_search").val();
						data.sal_to_search = $("#sal_to_search").val();
					},
					url:"/rest/advertising_all",
					type:"POST",
				},
				"columnDefs":[
					{
						"targets":[2, 3], // Столбцы, по которым не нужна сортировка
						"orderable":false,
					},
				],
			});

			$(document).on('submit', '#user_form', function(event){
				event.preventDefault();

				var vacancy_info = {
					"Naizvanie":$("#Naizvanie").val(),
					"data":$("#date").val(),
					"Opisanie":$("#Opisanie").val(),
					"tel":$("#tel").val()
				};

				var method="PUT";
				if($("#userModal #operation").val() == 1) {
					method="PATCH";
					vacancy_info.ID = $("#user_id").val();
				}

				$.ajax({
					url:"/rest/advertising",
					method: method,
					data: JSON.stringify(vacancy_info),
					headers: {
						"Content-type":"application/json"
					},
					success:function(data)
					{
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						dataTable.ajax.reload();
					}
				});
			});

			$(document).on('click', '.update', function(event){

				var id = $(this).attr("id");

				$.ajax({
					url:"/rest/advertising_one?id="+id,
					method:'GET',
					dataType: "json",
					success:function(data)
					{
						

						//Заголовок окна
						$('.modal-title').text("Редактировать товар");

						$("#userModal #Naizvanie").val(data.Nazvanie);
						$("#userModal #date").val(data.Data);
						$('#userModal #Opisanie').val(data.Opisanie);
						$('#userModal #tel').val(data.Tel);
						$('#userModal #user_id').val(id);

						//Флаг операции (1 - редактирование)
						$("#userModal #operation").val("1");

						//Текст на кнопке
						$("#userModal #action").val("Сохранить изменения");

						//Отобразить форму
						$('#userModal').modal('show');
					}
				});

				$.ajax({
					url:"/rest/comp?id="+id,
					method:'GET',
					dataType: "json",

					success:function(data){
						console.log(data);
						$("#userModal #Proc").val(data.Proc);
						$("#userModal #Pamyat").val(data.Pamyat);
					}
				});

				event.preventDefault();
			});

			$("#search_btn").click(function() {
				dataTable.ajax.reload();
			});

			$("#clear_search_btn").click(function() {

				let ns = $("#name_search");
				let sfs = $("#sal_from_search");
				let sts = $("#sal_to_search");

				if(ns.val() || sfs.val() || sts.val()){
					ns.val("");
					sfs.val("");
					sts.val("");

					dataTable.ajax.reload();
				}
			});

			$("#add_button").click(function() {
				//Режим добавления (кнопка Добавить)

				//Заголовок окна
				$('.modal-title').text("Добавить объявление");
				//Текст на кнопке
				$("#userModal #action").val("Добавить");
				//Флаг операции (0- добавление)
				$("#userModal #operation").val("0");
			});

			$(document).on("click",".delete",function() {
				//Режим удаления (кнопка Удалить)
				var user_id = $(this).attr("id");

				if(confirm("Действительно удалить?")){
					$.ajax({
						url:"/rest/advertising?id="+user_id,
						method:"DELETE",
						success:function(data){
							dataTable.ajax.reload();
						}
					});
				}
				else{
					return false;
				}
			});

		});
	</script>
</head>
<body>

<header class="header ">
  <div class="overlay"></div>
   <div class="container">
   	  <div >
  	<h1>
  		Рекламные объявления
  		<!--<p>
  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  		<button class="btn btn-outline-secondary btn-lg">See more</button>-->
  	</h1>
  </div>
   </div>
  
</header>
<div class="container box">

	<div class="">
		<br />
		<div align="right">
			<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Добавить</button>
		</div>

		

	</div>
	<br /><br />
	<table id="user_data" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="10%">Наименование</th>
			<th width="10%">Дата</th>
			<th width="10%"></th>
			<th width="10%"></th>
		</tr>
		</thead>
	</table>
</div>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form"  class="form-horizontal" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Добавить объявление</h4>
				</div>
				<div class="modal-body" >

					<div class="form-group">

						<label class="col-sm-4 control-label" for="Naizvanie">Наименвание</label>
						<div class="col-sm-5">
							<input type="text" name="Naizvanie" id="Naizvanie" class="form-control" />
						</div>
					</div>
					<div class="form-group">

						<label class="col-sm-4 control-label" for="zar">Дата</label>
						<div class="col-sm-5">
							<input type="date" name="date" id="date" class="form-control" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" >Описание</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="Opisanie"  name="Opisanie" rows="7"></textarea>
						</div>
					</div>
					<div class="form-group">

						<label class="col-sm-4 control-label" for="Naizvanie">Телефон</label>
						<div class="col-sm-5">
							<input type="text" name="tel" id="tel" class="form-control" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Добавить" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
