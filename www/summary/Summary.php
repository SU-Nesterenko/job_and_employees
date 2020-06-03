<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Список резюме</title>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/summary.css" rel="stylesheet" />

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/pooper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>	
	<script src="js/jquery.js"> </script>	
	<script src="js/inputmask.js"></script>
	<script src="js/angularjs.js"></script>
	
	<script src="js/summary.js"></script>
</head>

<body>
    <div class="page">
        <div class="section header">
            <h1>Список резюме</h1>
        </div>

        <div class="section content">
			<table id="table_data">
				
			</table>
        </div>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body">
        <form ng-app="app" 
			id="js-summary-form" 
			action="./AddNewSummary.php" 
			method="post" 
			name="summaryForm" 
			controller="validateCtrl" 
			novalidate>
			
			<input type="hidden" id="js-summary-id" name="id"/>
			<div class="form-group">				
				<label for="js-name">Наименование резюме: </label> 
				<input id="js-name" 
					type="text" 
					name="name" 
					class="form-control" 
					ng-model="name" required/>
				<legend>Заполните поле "Наименование резюме"</legend>
				<span style="color:red" ng-show="summaryForm.name.$dirty && summaryForm.name.$invalid">
				<span ng-show="summaryForm.name.$error.required">Поле "Наименование резюме" - обязательно для заполнения.</span>
			</div>
			
			<div class="form-group">
				<label for="js-salary">Заработная плата: </label>
					<div class="salary-input-row">
						<input id="js-salary" type="text" name="salary" 
							class="form-control"/><span>₽</span>
					</div>				
				<legend>Заполните поле "Заработная плата"</legend>
			</div>
			
			<div class="form-group">
				<label for="js-description">Описание: </label> 
				<textarea id="js-description" name="description" class="form-control" ng-model="description" required></textarea>
				<legend>Заполните поле "Описание", максимальное количество символов 1000</legend>
				
				<span style="color:red" ng-show="summaryForm.description.$dirty && summaryForm.description.$invalid">
				<span ng-show="summaryForm.description.$error.required">Поле "Описание резюме" - обязательно для заполнения.</span>
			</div>
			
			<div class="form-group">
				<label for="js-mode">Режим работы: </label> 
				<select id="js-mode" name="mode" class="form-control" >
				<option value="0">Выберите режим работы</option>
				<option value="1">Основная</option>
				<option value="2">Совместительство</option>
				<option value="3">Удалённая</option>
				</select>
				<legend>Выберите режим работы</legend>
			</div>

			<div class="form-group">
				<input type="submit" id="btn-submit" value="Сохранить" 
					class="form-control btn btn-md btn-success" ng-disabled="summaryForm.name.$dirty && summaryForm.name.$invalid || summaryForm.name.$pristine && summaryForm.name.$pristine ||  
						summaryForm.description.$dirty && summaryForm.description.$invalid || summaryForm.description.$pristine && summaryForm.description.$pristine"/>
			</div>
		</form>
		
		<script>
			var app = angular.module('app', []);
			app.controller('validateCtrl', function($scope){});	
		</script>
      </div>
    </div>
  </div>
</div>
</body>
</html>
