<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_job";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM vacancy";
$result = mysqli_query($conn, $sql);

 ?>

<html>
  <head>
    <meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src='js/popper.min.js'></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/main.js'></script>
    <title></title>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg fixed-top" >
	  <a class="navbar-brand" href="index.php">Главная</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-4">
			  <li class="nav-item">
				  <a class="nav-link" href="#" id="home" data-value="IT">Вакансии</a>
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
    <h1 style="margin-left:30px;important;">Vacuncies</h1>
    <?php
    while (  $row =  mysqli_fetch_assoc($result)    )
            {
       ?>
      <ul style="list-style-type:none;">

      <?php echo '<a href="show_vacuncy.php?id='.$row['ID'].'">'.$row['Nazvanie'].'</a>'; ?>

      </ul>
    <?php  } ?>

  </body>
</html>
