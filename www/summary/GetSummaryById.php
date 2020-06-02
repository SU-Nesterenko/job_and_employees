<?php
// Параметры для подключения
            $db_host = "localhost"; 
            $db_user = "root"; // Логин БД
            $db_password = ""; // Пароль БД
            $db_base = 'db_job'; // Имя БД
            $db_table = "summary"; // Имя Таблицы БД

            $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
            //Проверка подключения
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
			
		$query = "SELECT * FROM summary AS SMY WHERE SMY.id = " . $_GET['id'];
		$result = mysqli_query($mysqli, $query);
		$row = mysqli_fetch_array($result);
	
		echo json_encode($row);
    

	//$result_options = mysqli_query($mysqli,"SELECT * FROM operatingmode");
    mysqli_close($mysqli);
?>