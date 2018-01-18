<!doctype html >
<html lang="en" ng-app="ufApp">
    <head>
        <meta charset="UTF-8">
        <title>Url Shortner</title>
        <link rel="stylesheet" href="css/app.css?ver=1.1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
        <script src="js/app.js"></script>
    </head>
    <body>
        <div>
            <div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <ul class="nav navbar-nav">
                        @yield('menu_items')
                  </ul>
                </nav>
            </div>
            <br/>

            <div class="jumbotron">
                @yield('content')
            </div>
        </div>
    </body>
</html>
