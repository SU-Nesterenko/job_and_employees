<!DOCTYPE html>
<?php
	$id = $_GET['id'];
	require_once("$_SERVER[DOCUMENT_ROOT]/../db/common.dal.inc.php");
	$sql = "SELECT * FROM resume where id=$id";
	$result = _DBQuery($sql);
	$row =  mysqli_fetch_assoc($result) ;

 ?>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src='js/popper.min.js'></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/main.js'></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="col-12">
  
  <nav class="navbar navbar-expand-lg fixed-top" >
	  <a class="navbar-brand" href="index.php">Главная</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-4">
			  <li class="nav-item">
				  <a class="nav-link" href="list.php" id="home" data-value="IT">Вакансии</a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="allresume.php" data-value="mag">Резюме</a>
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
	<h1><?php echo $row['dolzhnost']; ?></h1>
	<div class="row">
		<div class="col-1 text-right"> Дата:
		</div>
		<div class="col-11"> <?php echo $row['date'] ?>	
		</div>
	</div>
		<div class="row">
		<div class="col-1 text-right">Опыт:	
		</div>
		<div class="col-11"> <?php echo $row['opit'] ?><br />	
		</div>
	</div>
		</div>
		<div class="row">
		<div class="col-1 text-right">Фамилия:	
		</div>
		<div class="col-11"><?php echo $row['fio'] ?> <br />	
		</div>
	</div>
		</div>
		<div class="row">
		<div class="col-1 text-right">Зарплата:	
		</div>
		<div class="col-11"> <?php echo $row['zarplata'] ?> <br />	
		</div>
	</div>
		</div>
		<div class="row">
		<div class="col-1 text-right">Описание:	
		</div>
		<div class="col-11"> <?php echo $row['opisanie'] ?> <br />	
		</div>
	</div>
		</div>
		<div class="row">
		<div class="col-1 text-right">График:	
		</div>
		<div class="col-11"> <?php echo $row['grafic'] ?> <br />	
		</div>
	</div>
		</div>
		<div class="row">
		<div class="col-1 text-right">Телефон:	
		</div>
		<div class="col-11"> <?php echo $row['telephone'] ?>	
		</div>
	</div>
  </body>
</html>
