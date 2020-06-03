<script>
$(document).ready(function(){
		
		//Отображение модального окна "Редактирование рзюме"
		$('.js-btn-edit').on('click', function(){
			$('#js-summary-form').attr('action','./EditSummaryById.php');
			var id = $('.js-btn-edit').attr('id');
			$('#exampleModalLabel').html('Редактирование резюме');
			console.log(id);			
			$.ajax({
				type: "GET",
				url: 'GetSummaryById.php?id='+id,
				dataType:"json",
				success: function(data){
					$('#js-summary-id').val(data.id);
					 $('#js-name').val(data.title);
					 $('#js-salary').val(data.salary);
					 $('#js-description').val(data.description);
					 $('#js-mode').val(data.mode);					 
				}
			});			
		});
		
		//Отображение модального окна "Создание резюме"
		$('#js-btn-create').on('click', function(){	
			var form = document.getElementById("js-summary-form");
			form.reset();	
			$('#exampleModalLabel').html('Создание резюме');			
			$(form).attr('action','AddNewSummary.php');
		});
});
</script>
<?php
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_base = 'db_job'; // Имя БД
    $db_table = "summary"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и закрываем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}


	$query = "SELECT SMY.id, SMY.title, SMY.description, 
		SMY.salary, OM.name FROM `summary` AS SMY
			INNER JOIN `operatingmode` AS OM
				ON OM.id = SMY.mode";
	$result = mysqli_query($mysqli, $query);
	
	$row = mysqli_fetch_array($result);
	
	$edit_link = 'http://localhost/index/Edit.php';
            $create_link = 'http://localhost/index/Create.php';

            echo "<table class='table table-bordered table-light'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Наименование</th>
                            <th scope='col'>Описание</th>
                            <th scope='col'>Заработная плата</th>
                            <th scope='col'>Режим работы</th>
                            <th scope='col'>
								<a href=".$create_link." class='btn btn-sm btn-success' 
									id='js-btn-create' data-toggle='modal' data-target='#exampleModal'> 
									<span class='fa fa-plus'></span>
								</a>
							</th>
                        </td>
                    </tr>
            </thead>";

            echo "<tbody>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['salary'] . " ₽</td>";
                echo "<td>" . $row['name'] . "</td>";

                echo "<td>						
						<a id=". $row['id'] ." href='#' class='js-btn-edit' data-toggle='modal' data-target='#exampleModal'>
							<i class='fa fa-cog'></i>
						</a>
					</td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";

    //echo json_encode($row);

    mysqli_close($mysqli);
?>

