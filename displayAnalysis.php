<?php
require("config.php");
if (empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php");
}
?>


<script>
    window.addEventListener('load', loadAnalysis, false);

    function loadAnalysis() {
       // document.getElementById("TheAnalysis").innerHTML = "<html>TODO</html>";
        $.ajax({
            url: "getAnalysis.php",
            cache: false,
            async: false
        })
            .done(function ($data) {
                var data = JSON.parse($data);

                var numberOfDays = 0;
                var numberOfHours = 0.0;
                var numberOfMiles = 0.0;

                var longestHours = 0.0;
                var longestMiles = 0.0;
                var longestDay;
                var longestStartLocation;
                var longestEndLocation;

                for (var i in data) {
                    var starting_location = data[i].starting_location;
                    var ending_location = data[i].ending_location;
                    var travel_time = Number(data[i].travel_time).toFixed(1);
                    var travel_distance = Number(data[i].travel_distance).toFixed(1);
                    var day_date = data[i].day_date;

                    numberOfDays++;
                    if(travel_time > longestHours){
                        longestHours = travel_time;
                        longestMiles = travel_distance;
                        longestDay = day_date;
                        longestStartLocation = starting_location;
                        longestEndLocation = ending_location;
                    }

                    numberOfHours = parseFloat(numberOfHours) + parseFloat(travel_time);
                    numberOfMiles = parseFloat(numberOfMiles) + parseFloat(travel_distance);
                }

                var theAnalysis = "<html>";
                theAnalysis += "<h3>Your vacation by the numbers...</h3>";
                theAnalysis += "<h4>Days on vacation: "+numberOfDays+"</h4>";
                theAnalysis += "<h4>Total miles traveled: "+numberOfMiles.toFixed(1)+"</h4>";
                theAnalysis += "<h4>Total hours driving: "+numberOfHours.toFixed(1)+"</h4>";
                theAnalysis += "<h4>Average miles traveled per day: "+(numberOfMiles/numberOfDays).toFixed(1)+"</h4>";
                theAnalysis += "<h4>Average hours traveled per day: "+(numberOfHours/numberOfDays).toFixed(1)+"</h4>";
                theAnalysis += "<br>";
                theAnalysis += "<h4>Your longest travel day traveling from "+longestStartLocation+" to "+longestEndLocation+" on "+longestDay+" with "+longestMiles+" miles traveled over "+longestHours+" hours.";
                theAnalysis += "<br>";

                if((numberOfHours/numberOfDays).toFixed(1) < 2.5){
                    theAnalysis += "<h5>Looks like you have a nice relaxing pace set...</h5>";
                    theAnalysis += "<img src=\"images/tropical-beach-hammock.jpg\" class=\"center\" />"
                } else if((numberOfHours/numberOfDays).toFixed(1) < 5){
                    theAnalysis += "<h5>Looks like you have a nice mix of activity and relaxation...</h5>";
                    theAnalysis += "<img src=\"images/familyRoadTrip.jpg\" class=\"center\" />"
                } else {
                    theAnalysis += "<h5>Looks like you have a lot of hours on the road each day, don't forget to enjoy the journey...</h5>";
                    theAnalysis += "<img src=\"images/oregontrail-died.png\" class=\"center\" />"
                }

                theAnalysis += "</html>";
                document.getElementById("TheAnalysis").innerHTML = theAnalysis;
            });
    }
</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vacation Analysis</title>

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
                    <li class="divider-vertical"></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container hero-unit">
    <h1>A quick analysis of your vacation</h1>
    <br><br>

    <button name="goBack" class="btn btn-primary btn-large" value="goBack"
            onClick="parent.location='vacationSummary.php'">Back To Summary
    </button>

</div>

<div id="TheAnalysis" class="container hero-unit"></div>

</body>
</html>