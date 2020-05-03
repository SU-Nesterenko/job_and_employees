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

  </head>
  <body class="col-12">
	
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
