var app = angular.module("app",[]);

/*app.directive("myAge",function($http){
	return {
		require: 'ngModel',
		link: function(scope,elem,attr,mCtrl) {
			//Объявление функции валидации
			function MyAgeValidator(value) {
				//Установить состояние валидности
				mCtrl.$setValidity("ageValidatorKey",value>18 && value<80);
				
				return value;
			}				
			//Добавить валидатор в систему
			mCtrl.$parsers.push(MyAgeValidator);
			
		}
	};
})*/

app.directive("myForm",function($http){
	return {
		scope: true,
		templateUrl: "login_ui.php",
		link: function(scope,elem,attr,mCtrl) {
			
			scope.user={};
			
			//Выполнение HTTP-запроса к REST API
			/*$http.get("http://localhost/rest/user?id="+attr.id).then(
				//Функция, вызываемая в случае успешного запроса
				function(response){
					scope.user=response.data;
					console.log(scope.user);
				},
				//Функция, вызываемая в случае ошибки запроса
				function() {
					alert("Ошибка при вызове удалённого метода ReadUser");
				}
			);*/

			/*scope.CreateOrUpdate = function(user){
				if(user.ID == null)
					scope.CreateUser(user);
				else
					scope.UpdateUser(user);
			}

			scope.CreateUser = function(user) {
				$http.put("http://localhost/rest/user",user).then(
					//Функция, вызываемая в случае успешного запроса
					function(response){
						alert("Данные успешно сохранены");
					},
					//Функция, вызываемая в случае ошибки запроса
					function() {
						alert("Ошибка при вызове удалённого метода CreateUser");
					}
				);
			}

			scope.UpdateUser = function(user) {
				$http.patch("http://localhost/rest/user",user).then(
					//Функция, вызываемая в случае успешного запроса
					function(response){
						alert("Данные успешно сохранены");
					},
					//Функция, вызываемая в случае ошибки запроса
					function() {
						alert("Ошибка при вызове удалённого метода CreateUser");
					}
				);
			}*/
		}
	};
})