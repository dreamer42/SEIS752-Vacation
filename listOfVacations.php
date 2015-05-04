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
                // if we don't find any rows (aka "<tr>") then give the link to create new vacation
                if (html.indexOf("<tr>") == -1) {
                    var newVacationLink =
                        "<h2>Please create a vacation first!</h2>" +
                        "<ul class=\"tabs\" data-tab>" +
                        "<li class=\"tab-title\"><a href=\"createNewVacation.php\">Create a New Vacation</a></li>" +
                        "</ul>";
                    document.getElementById("TheListOfVacations").innerHTML = newVacationLink;
                } else {
                    document.getElementById("TheListOfVacations").innerHTML = html;
                }

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

    function deleteVacation($vacationId) {
        var result;
        bootbox.confirm("Are you sure you want to delete this vacation?", function (result) {
            if (result) {
                $.ajax({
                    url: "deleteVacation.php",
                    cache: false,
                    async: false,
                    data: { vacationId: $vacationId }
                })
                    .done(function () {
                        window.location.href = "listOfVacations.php"
                    });
            }
        });
    }

</script>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vacation Welcome</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="libs/bootbox.min.js"></script>
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="libs/bootstrap.min.css" rel="stylesheet" type="text/css">
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