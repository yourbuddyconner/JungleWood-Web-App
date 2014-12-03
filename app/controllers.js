angular.module("JungleWood.controllers", ["ui.router"])

.controller('authCtrl', function ($scope, $state, $rootScope, $location, $http, Data) {
    //initially set those objects to null to avoid undefined error
    $scope.login = {};
    $scope.signup = {};
    $scope.doLogin = function (user) {
        Data.post('login', {
            user: user
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $state.go('dashboard');
            }
        });
    };
    $scope.signup = {email:'',password:'',first_name:'', last_name:'', username:''};
    $scope.signUp = function (user) {
        Data.post('signUp', {
            user: user
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };
    $scope.logout = function () {
        Data.get('logout').then(function (results) {
            Data.toast(results);
            $location.path('login');
        });
    };
})

.controller('dashCtrl', function($scope, $rootScope){
    $scope.logout = function () {
        Data.get('logout').then(function (results) {
            if(results){
                Data.toast(results);
            }
            else{
                Data.toast("Unsuccessful, an error occured on the server...");
            }
            $location.path('login');
        });
    };
})

.controller('homeCtrl', function($scope){
    // TODO
})

.controller('navCtrl', function($scope, $rootScope){
    //TODO
});
