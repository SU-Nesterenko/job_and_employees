<form name="myForm" action="auth/reg.php" method="POST">
    Ваше полное имя:<br/>
    <input id="f_fullname" name="f_fullname" type="text" size="50" ng-model="user.name" required/><br/>
    Email:<br/>
    <input id="f_email" name="f_email" type="text" ng-model="user.email" required/><br/>
    Пароль:<br/>
    <input id="f_password" name="f_password" type="password" ng-model="user.pass1" required/><br/>
    Подтверждение пароля:<br/>
    <input id="f_confirm" name="f_confirm" type="password" ng-model="user.pass2" required/><br/>
    Зарегистрировать учётную запись:<br/>
    <div id="f_roleid" required>
        <input name="f_roleid" id="aspirant" type="radio" value="2" checked/>
        <label for="aspirant">Соискателя</label><br/>

        <input name="f_roleid" id="employer" type="radio" value="3" />
        <label for="employer">Работодателя</label><br/>

        <input name="f_roleid" id="advertiser" type="radio" value="4"/>
        <label for="advertiser">Рекламодателя</label><br/>
    </div>
    <div style="color: #F00;">
        <div ng-show="myForm.$invalid && (myForm.f_fullname.$touched || myForm.f_email.$touched || myForm.f_password.$touched || myForm.f_confirm.$touched)">
            <div ng-show="myForm.f_fullname.$invalid && myForm.f_fullname.$touched">Обязательное поле "имя" не заполнено</div>
            <div ng-show="myForm.f_email.$invalid && myForm.f_email.$touched">Обязательное поле "email" не заполнено</div>
            <div ng-show="myForm.f_password.$invalid && myForm.f_password.$touched">Введите пароль</div>
            <div ng-show="myForm.f_confirm.$invalid && myForm.f_confirm.$touched">Введите повтор пароля</div>
        </div>
        <div ng-show="user.pass1 !== user.pass2">Пароли не совпадают</div>
        <br>
    </div>
    <input name="Enter" type="Submit" ng-show="!myForm.$invalid && (user.pass1 == user.pass2)"/>
</form>