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
$id = $_GET['id'];

$sql = "SELECT * FROM vacancy WHERE ID = $id";
$result = mysqli_query($conn, $sql);
 $row =  mysqli_fetch_assoc($result) ;

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
   <h1 style="margin-left: 40px!important"><?php echo $row['Nazvanie']; ?></h1>
   <div style="margin-left: 40px!important" >
   Salary : <?php echo $row['salary'] ?> <br />
   Duty : <?php echo $row['duty'] ?><br />
   Opisanie :<?php echo $row['Opisanie'] ?>
 </div>
  </body>
</html>
