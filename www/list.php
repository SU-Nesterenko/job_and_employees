<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
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
    <title></title>
  </head>
  <body>
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
