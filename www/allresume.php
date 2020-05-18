<!DOCTYPE html>
<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/../db/common.dal.inc.php");
	$sql = "SELECT * FROM resume";
	$result = _DBQuery($sql);
 ?>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title></title>
	<style>
		tr{
			cursor:pointer;
		}
	</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src='js/popper.min.js'></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/main.js'></script>
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
    <h1 style="margin-left:30px;important;">Резюме</h1>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Должность</th>
      <th scope="col">Дата</th>
      <th scope="col">Опыт</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while (  $row =  mysqli_fetch_assoc($result)    )
            {
       ?>
      <ul style="list-style-type:none;">

      <?php echo '   
		<tr onclick="window.location=\'oneresume.php?id=' . $row['id'] . '\';">
			<th scope="row">' . $row['id'] . '</th>
			<td>'. $row['dolzhnost']. ' </td>
			<td>'. $row['date']. '</td>
			<td>'. $row['opit']. '</td>
		</tr>'
	;?>

      </ul>
    <?php  } ?>
   
  </tbody>
</table>
  </body>
</html>
