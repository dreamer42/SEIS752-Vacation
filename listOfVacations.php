<?php
require("config.php");
if (empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php");
}


?>

<script>

    window.addEventListener('load', loadListOfVacations, false);

    function loadListOfVacations() {
        $.ajax({
            url: "listOfVacationsList.php",
            cache: false
        })
            .done(function (html) {
                document.getElementById("TheListOfVacations").innerHTML = html;
            });
    }

    function setCurrentVacationId($vacationId) {
        $.ajax({
            url: "setCurrentVacationId.php",
            cache: false,
            async: false,
            data: { vacationId: $vacationId }
        })
            .done(function (html) {
                // just setting value, nothing to do here
            });
    }

</script>

<!doctype html>
<html lang="en">

<meta charset="utf-8">
<title>Vacation Welcome</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="libs/bootstrap.min.js"></script>
<link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    body {
        background: url(images/bglight.png);
    }

    .hero-unit {
        background-color: #fff;
    }

    .center {
        display: block;
        margin: 0 auto;
    }
</style>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a href="welcome.php" class="brand">Vacation</a>

            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <!--<li><a href="register.php">Register</a></li>-->
                    <li class="divider-vertical"></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container hero-unit">
    <h2>Please select vacation below for more information about that vacation</h2>
</div>

<div id="TheListOfVacations" class="container hero-unit"></div>

</body>
</html>