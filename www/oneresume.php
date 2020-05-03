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
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="col-12">
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
