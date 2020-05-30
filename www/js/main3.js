var app = angular.module("app",[]);

app.directive("myForm",function($http){
    return {
        scope: true,
        templateUrl: "reg_user_ui.php",
        link: function(scope,elem,attr,mCtrl) {

            scope.user={};
        }
    };
})