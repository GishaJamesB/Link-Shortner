<!doctype html >
<html lang="en" ng-app="ufApp">
<head>
<meta charset="UTF-8">
<title>Url Shortner</title>
<link rel="stylesheet" href="css/app.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
<script src="js/app.js"></script>
</head>
<body>
<div>
<div>
<nav class="navbar navbar-inverse" role="navigation">
       <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home<span class="sr-only">(current)</span></a></li>
      <li><a href="/stats">Stats</a></li>
    </ul>
</nav>
</div>
<br/>
<div class="jumbotron" ng-controller="HomeController">

<form class="form-horizontal" role="form" method="post">
    <div class="form-group">
        <label for="name" class="col-sm-5 control-label">Please enter the Url</label>
        <div class="col-sm-7">
            <div class="input-group">
                <input ng-model="url" type="text" class="form-control" id="url" name="url" placeholder="Enter Url" value="">
                <span class="input-group-btn">
                    <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary" ng-click="shortenUrl()">
                </span>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</body>
</html>
