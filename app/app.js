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
    .state('home', {
      url: "/",
      templateUrl: "views/home.html",
      controller: "homeCtrl"
    });
});

app.run(function ($rootScope, $location, Data) {
    $rootScope.$on("$routeChangeStart", function (event, next, current) {
        $rootScope.authenticated = false;
        Data.get('session').then(function (results) {
            if (results.uid) {
                $rootScope.authenticated = true;
                $rootScope.uid = results.uid;
                $rootScope.name = results.name;
                $rootScope.email = results.email;
            } else {
                var nextUrl = next.$$route.originalPath;
                if (nextUrl == '/signup' || nextUrl == '/login') {

                } else {
                    $location.path("/login");
                }
            }
        });
    });
});