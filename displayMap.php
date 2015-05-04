<?php
require("config.php");
if (empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php");
}

$currentVacationId = $_SESSION['currentVacationId'];
?>

<!-- Basis for code from https://developers.google.com -->

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIUrVy_InedXDCqKn3QsvuqGDwYdziiGI">
</script>

<script>

    window.addEventListener('load', loadTravelLocationsInformation, false);

    var origin;
    var destination;
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function loadTravelLocationsInformation() {
        loadTravelResults();
    }

    function initialize() {
        if (directionsDisplay) {
            directionsDisplay.setMap(null);
        }
        directionsDisplay = new google.maps.DirectionsRenderer();
        var mapOptions = {
        }
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        document.getElementById("directionsPanel").innerHTML = "";
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById("directionsPanel"));
    }



    function calcRoute() {

        //var start = document.getElementById("origin").value;
        //var end = document.getElementById("destination").value;


//        var waypts = [];
//        var checkboxArray = document.getElementById('waypoints');
//        for (var i = 0; i < checkboxArray.length; i++) {
//            if (checkboxArray.options[i].selected == true) {
//                waypts.push({
//                    location:checkboxArray[i].value,
//                    stopover:true});
//            }
//        }
//
//        var request = {
//            origin: start,
//            destination: end,
//            waypoints: waypts,

        getOrigin();
        getDestination();

        //var destination = "Portland, ME";

        var wayPoints = [];
//        wayPoints.push({
//            location: "yellowstone national park",
//            stopover: true});
        wayPoints.push({
            location: "mesa verde national park",
            stopover: true});
        wayPoints.push({
            location: "great sand dunes national park",
            stopover: true});
        wayPoints.push({
            location: "garden of the gods",
            stopover: true});
        wayPoints.push({
            location: "eagan, mn",
            stopover: true});
        wayPoints.push({
            location: "houghton,mi",
            stopover: true});
        wayPoints.push({
            location:"manistee,mi",
            stopover:true});
        wayPoints.push({
            location:"detroit,mi",
            stopover:true});
        wayPoints.push({
            location:"boston,ma",
            stopover:true});


        //TODO: get waypoints working!!!

        var request = {
            origin: origin,
            destination: destination,
//            waypoints: wayPoints,
            travelMode: google.maps.TravelMode.DRIVING
        };
        var directionsService = new google.maps.DirectionsService();

        // reference https://developers.google.com/maps/documentation/javascript/directions#DirectionsStatus
        //    OK indicates the response contains a valid DirectionsResult.
        //    NOT_FOUND indicates at least one of the locations specified in the request's origin, destination, or waypoints could not be geocoded.
        //    ZERO_RESULTS indicates no route could be found between the origin and destination.
        //    MAX_WAYPOINTS_EXCEEDED indicates that too many DirectionsWaypoints were provided in the DirectionsRequest. The maximum allowed waypoints is 8, plus the origin, and destination. Google Maps API for Work customers are allowed 23 waypoints, plus the origin, and destination. Waypoints are not supported for transit directions.
        //    INVALID_REQUEST indicates that the provided DirectionsRequest was invalid. The most common causes of this error code are requests that are missing either an origin or destination, or a transit request that includes waypoints.
        //    OVER_QUERY_LIMIT indicates the webpage has sent too many requests within the allowed time period.
        //    REQUEST_DENIED indicates the webpage is not allowed to use the directions service.
        //    UNKNOWN_ERROR indicates a directions request could not be processed due to a server error. The request may succeed if you try again.

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else if (status == google.maps.DirectionsStatus.NOT_FOUND) {
                $('#errorMessage').append("Sorry, at least one of the locations specified could not be geocoded<br><br>");
            } else if (status == google.maps.DirectionsStatus.ZERO_RESULTS) {
                $('#errorMessage').append("Sorry, couldn't find a route for at least one segment of your vacation<br><br>");
            } else if (status == google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
                $('#errorMessage').append("Sorry, more than 10 places exceeds service max<br>");
                $('#errorMessage').append("With additional funding we can upgrade to paid service.<br><br>");
            } else if (status == google.maps.DirectionsStatus.INVALID_REQUEST) {
                $('#errorMessage').append("Sorry, problem creating map...<br><br>");
            } else if (status == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
                $('#errorMessage').append("Sorry, number of requests in last 24 hours exceeds service max<br>");
                $('#errorMessage').append("With additional funding we can upgrade to paid service.<br><br>");
            } else if (status == google.maps.DirectionsStatus.REQUEST_DENIED) {
                $('#errorMessage').append("Sorry, problem creating map...<br><br>");
            } else if (status == google.maps.DirectionsStatus.UNKNOWN_ERROR) {
                $('#errorMessage').append("Sorry, problem creating map...<br><br>");
            }
        });


        }

        function loadTravelResults() {
            initialize();
            calcRoute();
        }

    function getOrigin() {
        $.ajax({
            url: "getOrigin.php",
            cache: false,
            async: false
        })
            .done(function ($origin) {
                origin = $origin;
            });
    }

    function getDestination() {
        $.ajax({
            url: "getDestination.php",
            cache: false,
            async: false
        })
            .done(function ($destination) {
                destination = $destination;
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
    <h2>Here's a map of your trip!</h2>

    <button name="goBack" class="btn btn-primary btn-large" value="goBack"
            onClick="parent.location='vacationSummary.php'">Back To Summary
    </button>

    <!--    <button name="Map" class="btn btn-primary btn-large" value="Map" onClick=href="createNewVacation.php" >Map</button>-->
    <!--    <li class="tab-title"><a href="createNewVacation.php">Create a New Vacation</a></li>-->


</div>

<div id="TheMap" class="container hero-unit">

    <h2 id="errorMessage"></h2>

    <div id="map-canvas" style="float:left;width:70%; height:80%"></div>
    <div id="directionsPanel" style="float:right;width:30%;height 80%"></div>

</div>

</body>
</html>
