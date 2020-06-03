<form name="myForm" action="auth/user_login.php" method="POST" style="margin-left: 15px">
    Логин: <br/>
    <input name="user_login" type="text" ng-model="user.Login" required/><br/>
    Пароль:<br/>
    <input name="user_password" type="password" ng-model="user.Password" required/><br/>

    <div ng-show="myForm.$invalid && myForm.user_login.$touched">
        Форма содержит ошибки:
        <div ng-show="myForm.user_login.$invalid && myForm.user_login.$touched">Обязательное поле "Логин" не заполнено</div>
        <div ng-show="myForm.user_password.$invalid && myForm.user_password.$touched">Обязательное поле "Пароль" не заполнено</div>
    </div>
    <br>
    <input name="Enter" type="Submit"/><br/>
</form>