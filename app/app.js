var app = angular.module('JungleWood', ["JungleWood.controllers", "JungleWood.services", "JungleWood.directives", "ui.router", "toaster", "ngAnimate"]);

app.config(function($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise("/");
  $stateProvider
    .state('login', {
      url: "/login",
      templateUrl: "views/login.html",
      controller: "authCtrl"
    })
    .state('logout', {
      url: "/logout"
    })
    .state('signup', {
      url: "/signup",
      templateUrl: "views/signup.html",
      controller: "authCtrl"
    })
    .state('dashboard', {
      url: "/dashboard",
      templateUrl: "views/dashboard.html",
      controller: "dashCtrl"
    })
    .state('home', {
      url: "/",
      templateUrl: "views/home.html",
      controller: "homeCtrl"
    });
});

//ensures that the user is always logged in
app.run(function ($rootScope, $state, Data) {
    $rootScope.$on("$stateChangeStart", function (event, toState, toParams, fromState, fromParams) {
        $rootScope.authenticated = false;
        var nextUrl = toState.name;
        //check if logging out
        if (nextUrl == 'logout') {
          //preform logout
          Data.get('logout').then(function (results) {
            Data.toast(results);
            $state.go('login');
          });
        }
        Data.get('session').then(function (results) {
            if (results.id) {
              //set the PHP session to rootScope
              $rootScope.authenticated = true;
              $rootScope.id = results.id;
              $rootScope.first_name = results.first_name;
              $rootScope.last_name = results.last_name;
              $rootScope.username = results.username;
              $rootScope.email = results.email;
            } 
            else {
              if (nextUrl == 'signup' || nextUrl == 'login') {} 
              else {
                event.preventDefault();
                $state.go("login");
              }
            }
        });
    });
});