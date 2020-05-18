<?php
	//Подключение файла аутентификации
	require_once("../auth/auth.inc.php");
	//Проверка роли
	if(!user_is_admin()) exit();

	//Подключение слоя доступа к данным
	//require_once("../db/dal.inc.php");

/*if(isset($_GET["toggleid"])) {
    DBToggleUser((int)$_GET["toggleid"]);
    header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_GET["delid"])) {
    DBDeleteUser((int)$_GET["delid"]);
    header("Location: $_SERVER[PHP_SELF]");
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

<meta charset="UTF-8">
<title>Управление пльзователями</title>
</head>
<body>

<div class="container">
<table class="table">
    <thead>
    <tr>
        <th scope="col">Имя</th>
        <th scope="col">Логин</th>
        <th scope="col">Блок/разблок</th>
        <th scope="col">Удаление</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>


</body>
</html>

<script>

$(function() {

    $.ajax({
        url:"/rest/getUsers",
        method: "GET",
        success:function(data) {
            data.data.forEach(function(item, i, arr) {

                $('.table tbody').append(
                    '<tr>' +
                    '     <th scope="row">' + item[1]  + '</th>' +
                    '     <td>' + item[2]  + '</td>' +
                    '     <td>' + item[3]  + '</td>' +
                    '     <td>' + item[4]  + '</td>' +
                    '</tr>'
                );
            });
        }
    });


    $(document).on('click', '.update', function(event){

        var id = $(this).attr("id");
        $.ajax({
            url:"/rest/switchUserActivation?id="+id,
            method:'GET',
            //dataType: "json",
            success:function(data){
                location.reload();
            }
        });
    });

    $(document).on("click",".delete",function() {
        var user_id = $(this).attr("id");

        if(confirm("Действительно удалить?")){
            $.ajax({
                url:"/rest/user?id="+user_id,
                method:"DELETE",
                success:function(data){
                    location.reload();
                }
            });
        }
        else{
            return false;
        }
    });

});

</script>