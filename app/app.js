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
      url: "/logout",
      templateUrl: "views/logout.html",
      controller: "authCtrl"
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

app.run(function ($rootScope, $state, Data) {
    $rootScope.$on("$stateChangeStart", function (event, toState, toParams, fromState, fromParams) {
        $rootScope.authenticated = false;
        Data.get('session').then(function (results) {
            if (results.id) {
                alert(results);
                $rootScope.authenticated = true;
                $rootScope.id = results.uid;
                $rootScope.name = results.name;
                $rootScope.email = results.email;
            } else {
                var nextUrl = toState.name;
                if (nextUrl == 'signup' || nextUrl == 'login') {

                } else {
                  event.preventDefault();
                  $state.go("login");
                }
            }
        });
    });
});