<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Welcome to JungleWood</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/toaster.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" />    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

    <style>
      a {
        color: orange;
        }
    </style>
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

  <body ng-app="JungleWood">
    <nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">  
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
             <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                    <img src="images/flags/US.png"/>
                    English(US) 
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="images/flags/DE.png"/> Deutsch</a></li>
                    <li><a href="#"><img src="images/flags/GB.png"/> English(UK)</a></li>
                    <li><a href="#"><img src="images/flags/FR.png"/> Français</a></li>
                    <li><a href="#"><img src="images/flags/RO.png"/> Română</a></li>
                    <li><a href="#"><img src="images/flags/IT.png"/> Italiano</a></li>
                    
                    <li class="divider"></li>
                    <li><a href="#"><img src="images/flags/ES.png"/> Español <span class="label label-default">soon</span></a></li>
                    <li><a href="#"><img src="images/flags/BR.png"/> Português <span class="label label-default">soon</span></a></li>
                    <li><a href="#"><img src="images/flags/JP.png"/> 日本語 <span class="label label-default">soon</span></a></li>
                    <li><a href="#"><img src="images/flags/TR.png"/> Türkçe <span class="label label-default">soon</span></a></li>
                 
                  </ul>
            </li>

          </ul> -->
          <ul class="nav navbar-nav navbar-left">
                <li>
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
                </li>
                 <li>
                    <a href="#"> 
                        <i class="fa fa-envelope-o"></i>
                        Email
                    </a>
                </li>
           </ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    <div >
      <div class="container" style="margin-top:20px;">

        <div data-ng-view="" id="ng-view" class="slide-animation"></div>

      </div>
    </body>
  <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
</html>

