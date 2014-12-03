<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Welcome to JungleWood</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="css/custom.css" rel="stylesheet"> -->
    <link href="css/toaster.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" />    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><link href= "css/bootstrap-theme.css"rel= "stylesheet" >

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.11/angular-ui-router.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-animate.js"></script>
    <script src="js/toaster.js"></script>
    <script src="app/services.js"></script>
    <script src="app/directives.js"></script>
    <script src="app/controllers.js"></script>
    <script src="app/app.js"></script>
  </head>

  <body ng-app="JungleWood" style="background-image: url('images/default.jpg')">
    <div class="container header">
      <div class="row more-padding-top">
        <div class="col-md-12 text-center">
          <a href="#/home">
            <img src="/images/logo.png" alt="">
          </a>
        </div>
      </div>
      <div class="row padding-top">
        <div class="col-md-8 col-md-offset-2 text-center">
          <nav role="navigation" ng-controller="navCtrl">  
              <ul class="list-inline">
                <li>
                  <a ui-sref="login" ng-show="!authenticated"> 
                    <i class="glyphicon glyphicon-log-in"></i>
                    Log In
                    {{!authenticated}}
                  </a>
                </li>
                <li>
                  <a ui-sref="signup" ng-show="!authenticated"> 
                    <i class="glyphicon glyphicon-cog"></i>
                    Register!
                  </a>
                </li>
                <li>
                  <a ui-sref="logout" ng-show="authenticated">
                    <i class="glyphicon glyphicon-log-out"></i>
                    Logout
                  </a>
                </li>
<!--                 <li>
                  <a href="#"> 
                    <i class="fa fa-facebook-square"></i>
                    Share
                  </a>
                </li>
                <li>
                  <a href="#"> 
                    <i class="fa fa-twitter"></i>
                    Tweet
                  </a>
                </li> -->
                <li>
                  <a href="#"> 
                    <i class="glyphicon glyphicon-edit"></i>
                    Contact
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top:75px;">
      <div ui-view></div>
    </div>
    </body>
  <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
</html>

